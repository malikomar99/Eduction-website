<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Library;
use Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;

class LibraryController extends Controller
{
    //

    protected $typeMap = [
        'course' => \App\Models\Course::class,
        'course_video' => \App\Models\CourseVideo::class,
        'course_test' => \App\Models\CourseTest::class,
        'course_file' => \App\Models\CourseFile::class,
    ];

    public function index()
    {
        $items = Library::with('libraryable')
        ->where('user_id', Auth::id())
        ->latest()
        ->get()
        ->map(function ($item) {
            // Get the short type name from the full class
            $item->libraryable_type = array_search($item->libraryable_type, $this->typeMap) ?: $item->libraryable_type;
            return $item;
        });

        return response()->json(['success' => true, 'data' => $items]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'libraryable_type' => 'required|in:course,course_video,course_test,course_file',
            'libraryable_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ], 422);
        }
        

        $modelClass = $this->typeMap[$request->libraryable_type];
        $item = $modelClass::find($request->libraryable_id);
    
        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
        }

        $library = Library::firstOrCreate([
            'user_id' => Auth::id(),
            'libraryable_id' => $request->libraryable_id,
            'libraryable_type' => $modelClass,
        ]);

        return response()->json(['success' => true, 'message' => 'Added to library.', 'library' => $library]);
    }

    public function destroy(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'libraryable_type' => 'required|in:course,course_video,course_test,course_file',
            'libraryable_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->first()
            ], 422);
        }

        $modelClass = $this->typeMap[$request->libraryable_type];

        $deleted = Library::where([
            'user_id' => Auth::id(),
            'libraryable_id' => $request->libraryable_id,
            'libraryable_type' => $modelClass,
        ])->delete();

        return response()->json([
            'success' => $deleted > 0,
            'message' => $deleted ? 'Removed from library.' : 'Item not found in library.'
        ]);
    }

}

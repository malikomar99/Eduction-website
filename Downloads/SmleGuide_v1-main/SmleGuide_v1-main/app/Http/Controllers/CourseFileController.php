<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\CourseFile;
use Illuminate\Http\Request;
use App\Models\UserCoursePurchase;
use Illuminate\Support\Facades\Storage;
use Str;
use Yajra\DataTables\Facades\DataTables;

class CourseFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd('hello');
        // $files = CourseFile::with('course')->paginate(20);

        if ($request->ajax()) {
          
            $files = CourseFile::with('course')->get();
            return DataTables::of($files)
                ->addIndexColumn()
                ->addColumn('file_name', function ($row) {
                    return $row->file_name ?? 'N/A';
                })
                ->addColumn('course_title', function ($row) {
                    return $row->course->title ?? 'N/A';
                })
                ->addColumn('format', function ($row) {
                    $formatBadges = [
                        'pdf' => '<span class="badge bg-danger-subtle text-danger fw-semibold rounded-pill">Pdf</span>',
                        'doc' => '<span class="badge bg-primary-subtle text-primary fw-semibold rounded-pill">doc</span>',
                        'docx' => '<span class="badge bg-primary-subtle text-primary fw-semibold rounded-pill">docx</span>',
                        'inline_text' => '<span class="badge bg-dark-subtle text-dark fw-semibold rounded-pill">Inline Text</span>',
                        'txt' => '<span class="badge bg-warning-subtle text-warning fw-semibold rounded-pill">txt</span>',
                    ];
                    $fileType = $formatBadges[$row->file_type] ?? '<span class="badge bg-success-subtle text-success fw-semibold rounded-pill">' . $row->file_type . '</span>';
                    return $fileType;
                })
                ->addColumn('privacy', function ($row) {
                    $privacyBadges = [
                        'private' => '<span class="badge bg-warning-subtle text-warning fw-semibold">Private</span>',
                        'public' => '<span class="badge bg-success-subtle text-success fw-semibold">Public</span>',
                    ];
                    $privacy = $privacyBadges[$row->open_for_all_users] ?? '<span class="badge bg-danger-subtle text-danger fw-semibold">' . $row->open_for_all_users . '</span>';
                    return $privacy;
                })
                ->addColumn('privacy_change', function ($row) {
                    $url = route('courseFiles.privacy', $row->id);

                    // Add the conditional class logic
                $privateFileClass = $row->open_for_all_users == 'private' ? 'is-invalid text-danger' : '';
                $publicFileClass = $row->open_for_all_users == 'public' ? 'text-success border-success' : '';
             

                $privacyClass = $privateFileClass . ' ' . $publicFileClass;

                    return "<form action='$url' method='POST'>" . csrf_field() . "
                            <select name='open_for_all_users' class='form-select $privacyClass' onchange='this.form.submit()'>
                                <option value='private' " . ($row->open_for_all_users == 'private' ? 'selected' : '') . ">Private</option>
                                <option value='public' " . ($row->open_for_all_users == 'public' ? 'selected' : '') . ">Public</option>
                            </select>
                            </form>";
                })
                ->addColumn('actions', function ($row) {
                    $showUrl = route('courseFiles.show', $row->id);
                    $editUrl = route('courseFiles.edit', $row->id);
                    $deleteUrl = route('courseFiles.destroy', $row->id);
                    $csrfToken = csrf_token();
                    return '
                        <td class="sort-quantity d-flex gap-2">
                            <a href="' . $showUrl . '" class="btn btn-icon btn-sm bg-primary-subtle text-primary me-1" aria-label="View">
                                <i class="mdi mdi-eye"></i>
                            </a>
                            <a href="' . $editUrl . '" class="btn btn-icon btn-sm bg-success-subtle text-success me-1" aria-label="Edit">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            
                          
                            <form id="delete-file-form" action="'. $deleteUrl .  '" method="POST" style="display:inline-block;">
                                             <input type="hidden" name="_token" value="' . $csrfToken . '">
                                             <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="btn btn-icon btn-sm bg-danger-subtle text-danger" onclick="confirmDeleteFile()">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                            </form>
                           
                        </td>
                    ';
                })
                ->rawColumns(['file_name','course_title','format', 'privacy', 'privacy_change', 'actions'])
                ->make(true);
        }


        return view('courseFiles.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $file = CourseFile::findOrFail($id);
        $file->file_path = base64_encode($file->file_path); // Encode file path for download
        return view("courseFiles.show", compact('file'));
    }

    public function download($encodedPath)
    {
        
        $path = base64_decode($encodedPath);
      
        if (!Storage::disk('private')->exists($path)) {
            abort(404);
        }

        return Storage::disk('private')->response($path);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        return view('courseFiles.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string|max:255',
            'course_id' => "required|exists:courses,id",
            'file_type' => "required|in:pdf,doc,txt,inline_text",
            'file_path' => "required_without:inline_text|file",
            'file_path.*' => "mimes:pdf,doc,docx,txt",
            'inline_text' => "required_without:file_path",
        ]);

        $courseFile = new CourseFile();
        $courseFile->file_name = $request->file_name;
        $courseFile->course_id = $request->course_id;
        $courseFile->inline_text = $request->inline_text;
        $courseFile->file_type = $request->file_type;
        $course = Course::find($request->course_id);

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = date('YmdHi') . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            // Store file privately
            $path = $file->storeAs('courses/' . Str::slug($course->title) . '/files', $filename, 'private');

            // Update file_type based on extension if not docx
            if ($file->getClientOriginalExtension() != 'docx') {
                $courseFile->file_type = $file->getClientOriginalExtension();
            }

            $courseFile->file_path = $path; // save single file path as string
        }
        $courseFile->save();

        return to_route('courseFiles.index')->with('success', 'Course file added successfully!');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $file = CourseFile::findOrFail($id);
        $courses = Course::get();
        return view("courseFiles.edit", compact('file', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $courseFile = CourseFile::findOrFail($id);
        $request->validate([
            'file_name' => 'required|string|max:255',
            'course_id' => "required|exists:courses,id",
            'file_type' => "required|in:pdf,doc,txt,inline_text",
            'file_path' => "required_without_all:inline_text,existing_files|file",
            'file_path.*' => "mimes:pdf,doc,docx,txt",
            'inline_text' => "required_without_all:file_path,existing_files",
        ]);
        $courseFile->file_name = $request->file_name;
        $courseFile->course_id = $request->course_id;
        $courseFile->inline_text = $request->inline_text;
        $courseFile->file_type = $request->file_type;
        $course = Course::find($request->course_id);
        $existingFile = $request->input('existing_files', null);

        // 1. Delete old file if replaced or removed
        $oldPath = $courseFile->file_path ?? null;

        if ($oldPath && $oldPath !== $existingFile) {
            Storage::disk('private')->delete($oldPath);
        }

        // 2. Add new uploaded file (if present)
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = now()->format('YmdHi') . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $courseNameSlug = Str::slug($course->title);
            $path = $file->storeAs("courses/{$courseNameSlug}/files", $filename, 'private');

            // Optional: Update file_type dynamically
            if ($file->getClientOriginalExtension() != 'docx') {
                $courseFile->file_type = $file->getClientOriginalExtension();
            }

            $courseFile->file_path = $path;
        } else {
            // If no new file uploaded, just keep the existing file path if provided
            $courseFile->file_path = $existingFile;
        }
        $courseFile->save();
        return to_route('courseFiles.index')->with('success', 'course File updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $file = CourseFile::findOrFail($id);
        $currentDateTime = Carbon::now();
        $subscription = UserCoursePurchase::where('course_id', $file->id)->where('expiry_date', '>=', $currentDateTime)->first();
        if ($subscription) {
            return back()->with('error', 'User has subscribed this course file');
        }
        // if ($file->file_path !=null && file_exists(public_path($file->file_path))) {
        //     unlink(public_path("$file->file_path"));
        // }
        $file->delete();
        return to_route('courseFiles.index')->with('success', 'course file deleted!');
    }

    public function changeFilePrivacy(Request $request)
    {
        $file = CourseFile::findOrFail($request->id);
        $file->open_for_all_users = $request->open_for_all_users; // Toggle the privacy status
        $file->update();
        return to_route('courseFiles.index')->with('success', 'File privacy updated successfully.');
    }
}

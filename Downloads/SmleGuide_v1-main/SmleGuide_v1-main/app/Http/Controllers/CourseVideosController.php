<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Str;
use Yajra\DataTables\Facades\DataTables;
class CourseVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd('hello');
        // $videos = CourseVideo::paginate(20);
         if ($request->ajax()) {
          
            $coursevideo = CourseVideo::with('course')->get();
            return DataTables::of($coursevideo)
                ->addIndexColumn()
                ->addColumn('video_label', function ($row) {
                    return $row->video_label ?? 'N/A';
                })
                ->addColumn('type', function ($row) {
                    return $row->type ?? 'N/A';
                })
             
                ->addColumn('status', function ($row) {
                    $status = [
                        'active' => '<span class="badge bg-success-subtle text-success fw-semibold">Active</span>',
                        'inactive' => '<span class="badge bg-success-subtle text-success fw-semibold">Non-Active</span>',
                    ];
                    $status = $status[$row->status] ?? '<span class="badge bg-danger-subtle text-danger fw-semibold">' . $row->status . '</span>';
                    return $status;
                })
                ->addColumn('actions', function ($row) {
                            $editUrl = route('course.videos.edit', $row->id);
                            $deleteUrl = route('course.videos.destroy', $row->id);
                            $csrfToken = csrf_token();

                            return '
                                <div class="d-flex gap-2">
                                    <a href="' . $editUrl . '" class="btn btn-icon btn-sm bg-success-subtle text-success me-1" aria-label="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>

                                    <form id="delete-form-' . $row->id . '" action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="_token" value="' . $csrfToken . '">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" class="btn btn-icon btn-sm bg-danger-subtle text-danger"
                                                onclick="confirmDeleteFile(' . $row->id . ')">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </div>
                            ';
                        })

                ->rawColumns(['video_label','type','status', 'actions'])
                ->make(true);
        }


        return view('course_videos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        return view('course_videos.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $baseRules = [
            'course_id' => 'required|exists:courses,id',
            'video_label' => 'required|string|max:255',
            'type' => 'required|in:local,youtube',
            'status' => 'required|in:active,inactive',
            'video_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    
        if ($request->type === 'local') {
            $baseRules['video_url'] = 'required|file|mimes:mp4,mov,webm,avi|max:512000';
        } else {
            $baseRules['video_url'] = 'required|url';
        }
    
        $validated = $request->validate($baseRules);
        $course = Course::findOrFail($validated['course_id']);
        $slug = Str::slug($course->title);
    
        $video = new CourseVideo();
        $video->course_id = $validated['course_id'];
        $video->video_label = $validated['video_label'];
        $video->type = $validated['type'];
        $video->status = $validated['status'];
    
        
        if ($request->hasFile('video_url') && $validated['type'] === 'local') {
            $file = $request->file('video_url');
            $filename = now()->format('Ymd_His') . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
    
            
            $path = $file->storeAs("courses/{$slug}/videos", $filename, 'private');
    
            $video->video_url = $path; // just the storage path
        } else {
            $video->video_url = $validated['video_url']; // YouTube or external URL
        }
    
     
        if ($request->hasFile('video_thumbnail')) {
            $thumb = $request->file('video_thumbnail');
            $thumbName = now()->format('Ymd_His') . '_' . Str::slug(pathinfo($thumb->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $thumb->getClientOriginalExtension();
            $thumb->move(public_path('uploads/courses/video_thumbnails'), $thumbName);
            $video->video_thumbnail = 'uploads/courses/video_thumbnails/' . $thumbName;
        }
    
        $video->save();
    
        return to_route('course.videos.index')->with('success', 'Video added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseVideo $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(CourseVideo $course_video)

    {
    //    dd($video);
     $courses = Course::get();
        return view('course_videos.edit',compact('course_video','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, CourseVideo $course_video)
{
    $vide = $course_video;

    // Base validation
    $baseRules = [
        'video_label' => 'required|string|max:255',
        'type' => 'required|in:local,youtube',
        'status' => 'required|in:active,inactive',
        'course_id' => 'required|exists:courses,id',
        'video_thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ];

    // Conditional video validation
    if ($request->type === 'local') {
        $baseRules['video'] = 'nullable|file|mimes:mp4,mov,webm,avi|max:51200';
    } else {
        $baseRules['video_url'] = 'required|url';
    }

    $validated = $request->validate($baseRules);

    // Fill basic fields
    $vide->fill([
        'course_id' => $validated['course_id'],
        'video_label' => $validated['video_label'],
        'type' => $validated['type'],
        'status' => $validated['status'],
    ]);

    // Handle local video file upload
    if ($request->hasFile('video') && $request->type === 'local') {
        // Delete old video file if exists
        if (!blank($vide->video_url) && file_exists(public_path($vide->video_url))) {
            unlink(public_path($vide->video_url));
        }

        $file = $request->file('video');
        $filename = now()->format('Ymd_His') . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/videos'), $filename);

        // Save path to video_url
        $vide->video_url = 'uploads/videos/' . $filename;
    } elseif ($request->type === 'youtube') {
        $vide->video_url = $validated['video_url'];
    }

    // Handle thumbnail upload
    if ($request->hasFile('video_thumbnail')) {
        if (!blank($vide->video_thumbnail) && file_exists(public_path($vide->video_thumbnail))) {
            unlink(public_path($vide->video_thumbnail));
        }

        $thumb = $request->file('video_thumbnail');
        $thumbName = now()->format('Ymd_His') . '_' . Str::slug(pathinfo($thumb->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $thumb->getClientOriginalExtension();
        $thumb->move(public_path('uploads/thumbnails'), $thumbName);

        $vide->video_thumbnail = 'uploads/thumbnails/' . $thumbName;
    }

    $vide->save();

    return to_route('course.videos.index')->with('success', 'Video updated.');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(CourseVideo $course_video)
{
    $course_video->delete();
    return to_route('course.videos.index')->with('success', 'Video deleted.');
}



}

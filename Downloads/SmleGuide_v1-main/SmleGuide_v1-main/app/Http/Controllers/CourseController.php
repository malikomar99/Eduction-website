<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Test;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseTest;
use App\Models\CourseVideo;
use File;
use Illuminate\Http\Request;
use App\Models\UserCoursePurchase;
use App\Models\Video;
use Yajra\DataTables\Facades\DataTables;
class CourseController extends Controller
{
    public function index(Request $request)
    {
        // $courses = Course::with('category')->paginate(20);

          if ($request->ajax()) {
          
            $course = Course::with('category')->get();
            return DataTables::of($course )
                ->addIndexColumn()
                ->addColumn('title', function ($row) {
                     $image = $row->image ? asset($row->image) : '/images/users/user-22.jpg';
                    return '<img src="'.$image.'" class="avatar avatar-sm rounded-circle me-3">'.$row->title.' '.$row->title ?? 'N/A';
                    return $row->title ?? 'N/A';
                })
                ->addColumn('name', function ($row) {
                    return $row->category->name ?? 'N/A';
                })
                ->addColumn('price', function ($row) {
                    return $row->price ?? 'N/A';
                })
                ->addColumn('validity_days ', function ($row) {
                    return $row->validity_days  ?? 'N/A';
                })
                ->addColumn('description', function ($row) {
                    $desc = $row->description ?? 'N/A';
                    return strlen($desc) > 10 ? substr($desc, 0, 10) . '...' : $desc;
                })

                // ->addColumn('format', function ($row) {
                //     $formatBadges = [
                //         'pdf' => '<span class="badge bg-danger-subtle text-danger fw-semibold rounded-pill">Pdf</span>',
                //         'doc' => '<span class="badge bg-primary-subtle text-primary fw-semibold rounded-pill">doc</span>',
                //         'docx' => '<span class="badge bg-primary-subtle text-primary fw-semibold rounded-pill">docx</span>',
                //         'inline_text' => '<span class="badge bg-dark-subtle text-dark fw-semibold rounded-pill">Inline Text</span>',
                //         'txt' => '<span class="badge bg-warning-subtle text-warning fw-semibold rounded-pill">txt</span>',
                //     ];
                //     $fileType = $formatBadges[$row->file_type] ?? '<span class="badge bg-success-subtle text-success fw-semibold rounded-pill">' . $row->file_type . '</span>';
                //     return $fileType;
                // })
                ->addColumn('status', function ($row) {
                    $status = [
                        'active' => '<span class="badge bg-success-subtle text-success fw-semibold">Active</span>',
                        'inactive' => '<span class="badge bg-danger-subtle text-danger fw-semibold">Non-Active</span>',
                    ];
                    $status = $status[$row->status] ?? '<span class="badge bg-danger-subtle text-danger fw-semibold">' . $row->status . '</span>';
                    return $status;
                })
                // ->addColumn('privacy_change', function ($row) {
                //     $url = route('courseFiles.privacy', $row->id);

                //     // Add the conditional class logic
                // $privateFileClass = $row->open_for_all_users == 'private' ? 'is-invalid text-danger' : '';
                // $publicFileClass = $row->open_for_all_users == 'public' ? 'text-success border-success' : '';
             

                // $privacyClass = $privateFileClass . ' ' . $publicFileClass;

                //     return "<form action='$url' method='POST'>" . csrf_field() . "
                //             <select name='open_for_all_users' class='form-select $privacyClass' onchange='this.form.submit()'>
                //                 <option value='private' " . ($row->open_for_all_users == 'private' ? 'selected' : '') . ">Private</option>
                //                 <option value='public' " . ($row->open_for_all_users == 'public' ? 'selected' : '') . ">Public</option>
                //             </select>
                //             </form>";
                // })
                ->addColumn('actions', function ($row) {
                    $showUrl = route('courses.show', $row->id);
                    $editUrl = route('courses.edit', $row->id);
                    $deleteUrl = route('courses.destroy', $row->id);
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
                ->rawColumns(['title','name','price', 'validity_days', 'description', 'status', 'actions'])
                ->make(true);
        }

        return view('courses.index');
    }
    public function show($id)
    {
        $course = Course::with('files','videos','tests')->findOrFail($id);
        return view('courses.show', compact('course'));
    }
    public function create()
    {
        $tests = Test::get();
        $categories = Category::get();
        return view('courses.create', compact('categories', 'tests'));
    }
    public function store(Request $request)

    {
        // return $request;
        $v = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'test_ids' => 'nullable|exists:tests,id|array',
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|numeric',
            'validity_days' => 'required|integer',
            'description' => 'required',
            'priority' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        // return $v;
        $course = new Course();
        $course->category_id = $request->category_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->validity_days = $request->validity_days;
        $course->status = $request->status;

        if ($image = $request->file('image')) {
    
            $destinationPath = 'uploads/courses/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            
        
            $course->image = $destinationPath.$profileImage;

       }
        $course->save();

        $course->tests()->attach($request->test_ids);
        return to_route('courses.index')->with('success', 'course added successfully!');
    }
    public function edit($id)
    {
        $tests = Test::get();
        $course = Course::with('category','videos','tests')->findOrFail($id);
        return view("courses.edit", compact('course','tests'));
    }
    public function update(Request $request, $id)

    {
        // return $request;
        $course = Course::findOrFail($id);
        $request->validate([
            // 'category_id' => 'required|exists:categories,id',
            'test_ids' => 'nullable|exists:tests,id|array',
            'video_ids' => 'nullable|exists:videos,id|array',
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|numeric',
            'validity_days' => 'required|integer',
            'description' => 'required',
            'priority' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        //  $course->category_id = $request->category_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->validity_days = $request->validity_days;
        $course->status = $request->status;
        if ($image= $request->file('image')) {
            $path = $course->image;
            if (File::exists($path)) {
                File::delete($path);
            }
                $destinationPath = 'uploads/courses/images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                
            
            $course->image = $destinationPath.$profileImage;
    
        }
        $course->save();
        // pivot table automatically inserted
        $course->tests()->attach($request->test_ids);
        return to_route('courses.index')->with('success', 'course updated successfully!');
    }
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $currentDateTime = Carbon::now();
        $subscription = UserCoursePurchase::where('course_id', $course->id)->where('expiry_date', '>=', $currentDateTime)->first();
        if ($subscription) {
            return back()->with('error', 'User has subscribed this course');
        }
        $path = $course->image;
        if (File::exists($path)) {
         
            File::delete($path);
        }
        $course->delete();
        return to_route('courses.index')->with('success', 'course deleted!');
    }
}

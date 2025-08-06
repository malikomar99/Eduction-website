<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use App\Models\UserCoursePurchase;
use Yajra\DataTables\Facades\DataTables;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $categories = Category::paginate(20);
          
        
        if ($request->ajax()) {
          
            $category = Category::all();
            return DataTables::of($category)
                ->addIndexColumn()
                ->addColumn('id', function ($row) {
                    return $row->id ?? 'N/A';
                })
                ->addColumn('name', function ($row) {
                          $image = $row->image ? asset($row->image) : '/images/users/user-22.jpg';
                    return '<img src="'.$image.'" class="avatar avatar-sm rounded-circle me-3">'.$row->title.' '.$row->name ?? 'N/A';
                    return $row->name ?? 'N/A';
                })
                ->addColumn('priority', function ($row) {
                    return $row->course->priority ?? 'N/A';
                })

                ->addColumn('status', function ($row) {
                    $status = [
                        'active' => '<span class="badge bg-warning-subtle text-warning fw-semibold">Active</span>',
                        'inactive' => '<span class="badge bg-success-subtle text-success fw-semibold">Non-Active</span>',
                    ];
                    $status = $status[$row->status] ?? '<span class="badge bg-danger-subtle text-danger fw-semibold">' . $row->status . '</span>';
                    return $status;
                })
                ->addColumn('created_at', function ($row) {
                    
                    return $row->created_at->diffForHumans();
                })
          
                ->addColumn('actions', function ($row) {
                    // $showUrl = route('courseFiles.show', $row->id);
                    $editUrl = route('categories.edit', $row->id);
                    $deleteUrl = route('categories.destroy', $row->id);
                    $csrfToken = csrf_token();
                    return '
                        <td class="sort-quantity d-flex gap-2">
                        
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
                ->rawColumns(['id','name','priority', 'status','actions','created_at'])
                ->make(true);
        }




        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'priority' => 'integer|required',
            'status' => 'string|required|in:active,inactive',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->priority = $request->priority;
        $category->status = $request->status;
 
        if ($image = $request->file('image')) {
    
            $destinationPath = 'uploads/categories/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            
        
        $category->image = $destinationPath.$profileImage;

       }

       $category->save();
        return to_route('categories.index')->with('success', 'category added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'string|required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'priority' => 'integer|required',
            'status' => 'string|required|in:active,inactive',
        ]);

        $category->name = $request->name;
        $category->priority = $request->priority;
        $category->status = $request->status;
        if ($image= $request->file('image')) {
            $path = $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
                $destinationPath = 'uploads/categories/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                
            
            $category->image = $destinationPath.$profileImage;
    
        }
        $category->save();
        return to_route('categories.index')->with('success', 'category updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        $currentDateTime =now();
        $subscription = UserCoursePurchase::where('category_id', $category->id)->where('expiry_date', '>=', $currentDateTime)->count();
        if ($subscription>0) {
            return back()->with('error', 'User has subscribed this category');
        }
        // return 'lk';
        $path = $category->image;
        if (File::exists($path)) {
         
            File::delete($path);
        }
        $category->delete();
        return to_route('categories.index')->with('success', 'category deleted!');
    }
}

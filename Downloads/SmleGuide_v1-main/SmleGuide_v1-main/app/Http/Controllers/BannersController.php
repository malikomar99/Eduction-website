<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Models\Banners;
use File;
use Illuminate\Http\Request;
use Storage;
use Validator;
use Yajra\DataTables\Facades\DataTables;
class BannersController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $banners = Banners::paginate(20);

          if ($request->ajax()) {
          
            $banners= Banners::all();
            return DataTables::of($banners)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                     $image = $row->image ? asset( $row->image) : '/images/users/user-22.jpg';
                
                    return '<img src="'.$image.'" class="avatar avatar-sm rounded-circle me-3">'.$row->name.' '.$row->name ?? 'N/A';
                    return $row->name ?? 'N/A';
                })
                ->addColumn('featured', function ($row) {
                    return $row->featured ?? 'N/A';
                })
              
                ->addColumn('status', function ($row) {
                    $status = [
                        'active' => '<span class="badge bg-success-subtle text-success fw-semibold">Active</span>',
                        'non-active' => '<span class="badge bg-danger-subtle text-danger fw-semibold">Non-Active</span>',
                    ];
                    $status = $status[$row->status] ?? '<span class="badge bg-danger-subtle text-danger fw-semibold">' . $row->status . '</span>';
                    return $status;
                })
               
                ->addColumn('actions', function ($row) {
                 
                    $editUrl = route('banners.edit', $row->id);
                    $deleteUrl = route('banners.destroy', $row->id);
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
                ->rawColumns(['name','featured', 'status', 'actions'])
                ->make(true);
        }



        return view('banners.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = $request->input('type');

        // Base rules
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
            'type' => 'required|in:image,video,video_link',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ];

        // Conditional rules
        if ($type === 'image') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
            $rules['image_redirection_link'] = 'required|url';
        } elseif ($type === 'video') {
            $rules['video'] = 'required|mimes:mp4,mov,ogg,qt|max:51200';
            $rules['video_thumbnail'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        } elseif ($type === 'video_link') {
            $rules['video_link'] = 'required|url';
        }

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd('hello');
        try {

            // dd('hello');
            $banner = new Banners();
            $banner->name = $request->name;
            $banner->description = $request->description ?? null;
            $banner->type = $request->type;
            $banner->status = $request->status == 'active' ? 1 : 0;
            $banner->from_date = $request->from_date;
            $banner->to_date = $request->to_date;

            // Handle fields based on banner type
            if ($request->type === 'image') {
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('banners/images', 'public');
                    $banner->image = 'storage/'.$imagePath;
                }
                $banner->image_redirection_link = $request->image_redirection_link;
            }

            if ($request->type === 'video') {
                if ($request->hasFile('video')) {
                    $videoPath = $request->file('video')->store('banners/videos', 'public');
                    $banner->video = 'storage/'.$videoPath;
                }

                if ($request->hasFile('video_thumbnail')) {
                    $thumbnailPath = $request->file('video_thumbnail')->store('banners/thumbnails', 'public');
                    $banner->video_thumbnail = 'storage/'.$thumbnailPath;
                }
            }

            if ($request->type === 'video_link') {
                $banner->video_link = $request->video_link;
            }

            $banner->save();


            return redirect()->route('banners.index')->with('success', 'Banner Created successfully!');

        } catch (\Exception $e) {

            return back()->with('error', 'Failed to create banner. ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banners $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banners $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = Banners::findOrFail($id);
        $type = $request->input('type');

        // Base rules
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
            'type' => 'required|in:image,video,video_link',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ];

        // Conditional rules
        if ($type === 'image') {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
            $rules['image_redirection_link'] = 'required|url';
        } elseif ($type === 'video') {
            $rules['video'] = 'nullable|mimes:mp4,mov,ogg,qt|max:51200';
            $rules['video_thumbnail'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        } elseif ($type === 'video_link') {
            $rules['video_link'] = 'required|url';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $banner->name = $request->name;
            $banner->description = $request->description ?? null;

            $banner->status = $request->status === 'active' ? 1 : 0;
            $banner->from_date = $request->from_date;
            $banner->to_date = $request->to_date;

            // Remove old files and nullify fields if type is changed
            if ($request->type !== $banner->type) {
                if ($banner->type === 'image' && $banner->image) {
                    Storage::disk('public')->delete('banners/images/' . basename($banner->image));
                }
                if ($banner->type === 'video') {
                    if ($banner->video) {
                        Storage::disk('public')->delete('banners/videos/' . basename($banner->video));
                    }
                    if ($banner->video_thumbnail) {
                        Storage::disk('public')->delete('banners/thumbnails/' . basename($banner->video_thumbnail));
                    }
                }

                // Nullify all media fields
                $banner->image = null;
                $banner->image_redirection_link = null;
                $banner->video = null;
                $banner->video_thumbnail = null;
                $banner->video_link = null;
            }
            $banner->type = $request->type;
            // Handle image type
            if ($type === 'image') {
                if ($request->hasFile('image')) {
                    // Delete old file if exists
                    if ($banner->image) {
                        Storage::disk('public')->delete('banners/images/' . basename($banner->image));
                    }
                    $imagePath = $request->file('image')->store('banners/images', 'public');
                    $banner->image = 'storage/' . $imagePath;
                }
                $banner->image_redirection_link = $request->image_redirection_link;
            }

            // Handle video type
            if ($type === 'video') {
                if ($request->hasFile('video')) {
                    if ($banner->video) {
                        Storage::disk('public')->delete('banners/videos/' . basename($banner->video));
                    }
                    $videoPath = $request->file('video')->store('banners/videos', 'public');
                    $banner->video = 'storage/' . $videoPath;
                }

                if ($request->hasFile('video_thumbnail')) {
                    if ($banner->video_thumbnail) {
                        Storage::disk('public')->delete('banners/thumbnails/' . basename($banner->video_thumbnail));
                    }
                    $thumbnailPath = $request->file('video_thumbnail')->store('banners/thumbnails', 'public');
                    $banner->video_thumbnail = 'storage/' . $thumbnailPath;
                }
            }

            // Handle video_link type
            if ($type === 'video_link') {
                $banner->video_link = $request->video_link;
            }

            $banner->save();

            return redirect()->route('banners.index')->with('success', 'Banner Updated Successfully.');

        } catch (\Exception $e) {

            return back()->with('error', 'Failed to update banner. ' . $e->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banners $banner)
    {

    
        $banner = Banners::find($banner->id);
       
        if ($banner->type === 'image' && $banner->image) {
            Storage::disk('public')->delete('banners/images/' . basename($banner->image));
        }
        if ($banner->type === 'video') {
            if ($banner->video) {
                Storage::disk('public')->delete('banners/videos/' . basename($banner->video));
            }
            if ($banner->video_thumbnail) {
                Storage::disk('public')->delete('banners/thumbnails/' . basename($banner->video_thumbnail));
            }
        }
        $banner->delete();
        return to_route('banners.index')->with('success', 'Banner Successfully Deleted!');
    }

}

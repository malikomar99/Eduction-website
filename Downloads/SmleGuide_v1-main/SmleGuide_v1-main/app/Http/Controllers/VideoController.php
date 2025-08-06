<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::paginate(20);
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        if ($request->type == 'local') {

            $request->validate([

                'video' => 'required|mimes:mp4,mov,webm,avi|file',
            ]);
        } else {

            $request->validate([
                'video' => 'required',
            ]);
        }
        $request->validate([
            'label' => 'required',
            'type' => "required|in:local,youtube",
        ]);

        $video = new Video();
        $video->label = $request->label;
        $video->video = $request->video;
        $video->type = $request->type;

        if ($request->file('video') && $request->type == 'local') {


            $file = $request->file('video');
            $filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/videos'), $filename);
            $video->video = 'uploads/videos/' . $filename;
        }
        $video->save();
        return to_route('videos.index')->with('success', 'Video  added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $vide= $video;
        // return $v;   
        if ($request->type == 'local') {

            $request->validate([

                'video' => 'nullable|mimes:mp4,mov,webm,avi|file',
            ]);
        } else {

            $request->validate([
                'video' => 'nullable',
            ]);
        }
        $request->validate([
            'label' => 'required',
            'type' => "required|in:local,youtube",
        ]);

        $vide->label = $request->label;
        $vide->type = $request->type;
        if (!blank($request->video)) {

            $vide->video = $request->video;
        }

        if ($request->file('video') && $request->type == 'local') {
            if (file_exists(public_path($vide->video))) {
                unlink(public_path("$vide->video"));
            }

            $file = $request->file('video');
            $filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/videos'), $filename);
            $vide->video = 'uploads/videos/' . $filename;
        }
        $vide->save();
        return to_route('videos.index')->with('success', 'Video  updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return to_route('videos.index')->with('success', 'Video  deleted.');
    }
}

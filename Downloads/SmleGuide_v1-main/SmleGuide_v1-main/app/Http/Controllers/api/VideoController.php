<?php

namespace App\Http\Controllers\api;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        $data=Video::get();
        if(!blank($data))
        {
            return apiResponse($data, 'data retrieved successfully');
           
        }
        return apiResponse([], 'data not found', false, 404);
    }
    public function show($id)
    {
        $data=Video::find($id);
        if(!blank($data))
        {
            return apiResponse($data, 'data retrieved successfully');
           
        }
        return apiResponse(null, 'data not found', false, 404);
    }
}

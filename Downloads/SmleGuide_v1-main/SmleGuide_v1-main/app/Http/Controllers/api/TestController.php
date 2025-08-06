<?php

namespace App\Http\Controllers\api;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        $data=Test::with('questions', 'questions.options')->get();
        if(!blank($data))
        {
            return apiResponse($data, 'data retrieved successfully');
           
        }
        return apiResponse([], 'data not found', false, 404);
    }
    public function show($id)
    {
        $data=Test::with('questions', 'questions.options')->find($id);
        if(!blank($data))
        {
            return apiResponse($data, 'data retrieved successfully');
           
        }
        return apiResponse(null, 'data not found', false, 404);
    }
}

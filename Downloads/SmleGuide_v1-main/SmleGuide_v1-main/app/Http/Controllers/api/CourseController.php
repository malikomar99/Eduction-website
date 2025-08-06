<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
   {
       $courses = Course::with('category', 'files', 'videos', 'tests.questions.options')->get();
       if ($courses->isNotEmpty()) {
           return apiResponse(CourseResource::collection($courses), 'Courses retrieved successfully');
       }
   
       return apiResponse([], 'No courses found', false, 404);
   }
   public function show($id)
   {
       $course = Course::with('category', 'files', 'videos', 'tests.questions.options')->find($id);
   
       if ($course) {
           return apiResponse(new CourseResource($course), 'Course retrieved successfully');
       }
   
       return apiResponse([], 'Course not found', false, 404);
   }
}

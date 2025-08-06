<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\UserCoursePurchase;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        $data=UserCoursePurchase::get();//all details with( 'file', 'file.course', 'file.course.category')->get();
        if(!blank($data))
        {
            return apiResponse($data, 'data retrieved successfully');
           
        }
        return apiResponse([], 'data not found', false, 404);
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'course_id' => 'required|exists:courses,id',
            'course_file_id' => 'required|exists:course_files,id',
        ]);

        $validity_days=Course::where('category_id',$request->course_id)->first()->validity_days;

        $subscription=new UserCoursePurchase();

        // $currentDateTime = now();
        // $expiry_date = $currentDateTime->addDays($validity_days);

        $subscription->user_id=auth('sanctum')->id();
        $subscription->category_id=$request->category_id;
        $subscription->course_id=$request->course_id;
        $subscription->course_file_id=$request->course_file_id;
        // $subscription->purchase_date=$currentDateTime;
        // $subscription->expiry_date=$expiry_date;
        $subscription->save();
        return response()->json([
            'status'=>true,
            'message'=>'course purchased successfully.',
            'data'=>$subscription,
        ]);

    }
    
}

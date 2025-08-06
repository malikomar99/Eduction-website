<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFile;
use App\Models\UserCoursePurchase;
use Auth;
use Illuminate\Http\Request;
use Storage;
use Str;
use Validator;

class CourcePurchaseController extends Controller
{
    //


    public function purchaseCourse(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'payment_method' => 'required|in:jazzcash,alfalah',
            'payment_slip' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
     
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error.',
                'errors' => $validator->errors(),
            ], 422);
        }
    
        try {
            $course = Course::findOrFail($request->course_id);
    
            // 🧾 Upload the payment slip if provided
            $paymentSlipPath = null;

            if ($request->hasFile('payment_slip')) {
                $file = $request->file('payment_slip');
                $userId = $request->user_id;
                $timestamp = now()->format('Ymd_His');
                $extension = $file->getClientOriginalExtension();
            
                $slug = Str::slug($course->title);
                $filename = "payment_proof_{$slug}_user_{$userId}_{$timestamp}.{$extension}";
            
                // ✅ Store in: storage/app/public/payment_proofs/{slug}
                $path = $file->storeAs("payment_proofs/{$slug}", $filename, 'public');
            
                // ✅ Accessible via: /storage/payment_proofs/{slug}/{filename}
                $paymentSlipPath = Storage::url($path);
            }
    
            // 📝 Create the purchase record
            $coursePurchase = UserCoursePurchase::create([
                'user_id' => $request->user_id,
                'category_id' => $course->category_id,
                'course_id' => $request->course_id,
                'payment_method' => $request->payment_method,
                'payment_slip' => $paymentSlipPath,
                'status' => 'pending',
                'purchase_date' => now(),
                'expiry_date' => now()->addDays($course->validity_days ?? 180),
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Course purchase request submitted successfully.',
                'data' => $coursePurchase,
            ], 201);
    
        } catch (\Exception $e) {
            // 🛑 Unexpected error
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function userPurchasedCourses($userId)
    {
        $purchases = UserCoursePurchase::where('user_id', $userId)->with('course:id,category_id,title,description,image,price,validity_days,status,priority')->select('id','user_id','category_id','course_id','purchase_date','expiry_date','payment_method','payment_slip','status')->get();

        if ($purchases->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No courses found for this user.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'purchased_courses' => $purchases,
        ]);
    }
}

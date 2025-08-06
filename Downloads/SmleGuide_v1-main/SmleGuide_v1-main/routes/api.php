<?php

use App\Http\Controllers\api\BannersController;
use App\Http\Controllers\api\CourcePurchaseController;
use App\Http\Controllers\api\LibraryController;
use App\Http\Controllers\CourseFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\TestController;
use App\Http\Controllers\api\VideoController;
use App\Http\Controllers\api\CourseController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\SubscriptionController;
use App\Http\Controllers\api\ForgotPasswordController;
use App\Http\Controllers\api\BusinessSettingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('sendRegistrationCode', [AuthController::class, 'sendRegistrationCode']);
Route::post('verifyRegistrationCode', [AuthController::class, 'verifyRegistrationCode']);
Route::post('login', [AuthController::class, 'login']);

Route::get('business-settings', [BusinessSettingController::class, 'index']);

Route::post('/forgotPassword/send-otp', [ForgotPasswordController::class, 'sendOtp']);
Route::post('/forgotPassword/verify-otp', [ForgotPasswordController::class, 'verifyOtp']);

// Route::post('forgotPassword', [ForgotPasswordController::class, 'sendResetLinkEmail']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('password/update', [AuthController::class, 'updatePassword']);
    Route::post('profile/update', [AuthController::class,'updateProfile'])->name('profile.update');
    Route::delete('profile/delete',[AuthController::class,'deleteProfile'])->name('profile.delete');


    
    Route::get('user-subscriptions',[SubscriptionController::class,'index']);
    Route::post('subscribeCourse',[SubscriptionController::class,'store']);

    Route::post('/logout', [AuthController::class, 'logout']);


    // coursecontroller
    Route::get('courses',[CourseController::class,'index']);
    Route::get('course-detail/{id}',[CourseController::class,'show']);

    // coursecontroller
    Route::get('videos',[VideoController::class,'index']);
    Route::get('video-detail/{id}',[VideoController::class,'show']);

    Route::get('mock-tests',[TestController::class,'index']);
    Route::get('mock-test-detail/{id}',[TestController::class,'show']);

    Route::get('banners',[BannersController::class,'index']);


    Route::get('categories',[CategoryController::class,'index']);
    Route::get('category-detail/{id}',[CategoryController::class,'show']);


    Route::get('/course-files/view/{file}', [CourseFileController::class, 'download']);
    

    // Purchase Course 
    Route::post('purchase-course', [CourcePurchaseController::class, 'purchaseCourse']);
    Route::get('/user-purchased-courses/{id}', [CourcePurchaseController::class, 'userPurchasedCourses']);


    /// Library //
    Route::get('/library', [LibraryController::class, 'index']);
    Route::post('/library', [LibraryController::class, 'store']);
    Route::delete('/library', [LibraryController::class, 'destroy']);
});

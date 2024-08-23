<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\AboutusController::class, 'aboutus'])->name('about-us');

Route::get('/', [App\Http\Controllers\AboutusController::class, 'welcome'])->name('welcome');
//   event routes
Route::get('/event-details', [App\Http\Controllers\AboutusController::class, 'Eventdetails'])->name('event-details');
Route::get('/our-event', [App\Http\Controllers\AboutusController::class, 'OurEvent'])->name('our-event');
Route::get('/event-list', [App\Http\Controllers\AboutusController::class, 'Eventlist'])->name('event-list');
// blogs route
Route::get('/blog/blog-details', [App\Http\Controllers\AboutusController::class, 'Blogdetails'])->name('blog-details');
Route::get('/blog/our-blogs', [App\Http\Controllers\AboutusController::class, 'Ourblogs'])->name('our-blogs');
// course route
Route::get('/course/our-course', [App\Http\Controllers\AboutusController::class, 'OurCourse'])->name('our-course');
Route::get('/course/course-list', [App\Http\Controllers\AboutusController::class, 'Courselist'])->name('course-list');
// tachers routes
Route::get('/teacher/our-teacher', [App\Http\Controllers\AboutusController::class, 'ourteacher'])->name('our-teacher');
Route::get('/teacher/teacher-details', [App\Http\Controllers\AboutusController::class, 'teacherdetails'])->name('teacher-details');
Route::get('/contact-us', [App\Http\Controllers\AboutusController::class, 'Contactus'])->name('contact-us');
// enrollment route
Route::get('/registration-form', [App\Http\Controllers\EnrollmentController::class, 'Registrationform'])->name('registration-form');
Route::post('/enrollment', [App\Http\Controllers\EnrollmentController::class, 'enrollment'])->name('enrollment');
// gallery route
Route::get('/gallery', [App\Http\Controllers\AboutusController::class, 'gallery'])->name('gallery');

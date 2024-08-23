<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function aboutus()
    {
        return view('about-us');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function Eventlist()
    {
        return view('event-list');
    }

    public function OurEvent()
    {
        return view('our-event');
    }

    public function Eventdetails()
    {
        return view('event-details');
    }
    public function Blogdetails()
    {
        return view('blogs.blog-details');
    }
    public function Ourblogs()
    {
        return view('blogs.our-blogs');
    }
    public function Contactus()
    {
        return view('contact-us');
    }
    public function OurCourse()
    {
        return view('course.our-course');
    }
    public function Courselist()
    {
        return view('course.course-list');
    }
   
    public function ourteacher()
    {
        return view('teacher.our-teacher');
    }
    public function teacherdetails()
    {
        return view('teacher.teacher-details');
    }
    public function gallery()
    {
        return view('gallery');
    }
}

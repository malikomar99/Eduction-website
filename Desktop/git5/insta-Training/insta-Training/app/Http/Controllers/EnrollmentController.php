<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
class EnrollmentController extends Controller
{
   public function enrollment(Request $request){
    $validated = $request->validate([
        'first_name' => 'required|max:255',
        'last_name' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'gender' => 'required',
        'course' => 'required',
        'time_table' => 'required',
        'city' => 'required',
        'phone' => 'required',
    ]);
    $user = new enrollment();
    $user->first_name=$request->first_name;
    $user->last_name=$request->last_name;
    $user->email=$request->email;
    $user->address=$request->address;
    $user->gender=$request->gender;
    $user->course=$request->course;
    $user->time_table=$request->time_table;
    $user->city=$request->city;
    $user->phone=$request->phone;
    $user->save();
    return back()->with('success','Enrollment is done');

   }
   public function Registrationform()
   {
       return view('registration-form');
   }
}

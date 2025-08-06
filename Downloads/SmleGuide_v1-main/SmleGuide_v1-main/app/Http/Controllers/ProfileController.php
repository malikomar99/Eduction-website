<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        return view('profile.index', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth()->user();
        $request->validate([
            'name' => "required",
            'email' => "required|unique:users,email,$user->id",
            'mobile' => "required",
            'country' => "required",
            'profile_picture' => "nullable|mimes:jpeg,jpg,png",
        ]);
        $user->title = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->country = $request->country;
        if ($image= $request->file('profile_picture')) {
            $path = $user->profile_pic;
            if (File::exists($path)) {
                File::delete($path);
            }
           $destinationPath = 'uploads/profile_picture/';
           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           
       
           $user->profile_picture = $destinationPath.$profileImage;

     }
        

        $user->save();
        return back()->with('success', 'Profile udpated');
    }

    public function password()
    {
        return view('profile.changePassword');
    }
    public function updatePassword(Request $request)
    {
        // return $request;
         $request->validate([
        'current_password' => 'required',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth()->user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Current password is incorrect');
    }

    $user->update([
        'password' => Hash::make($request->password),
    ]);

    return back()->with('success', 'Password successfully updated!');
    }
}

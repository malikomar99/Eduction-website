<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->check()){
            return redirect('/home');

        }

        return view('auth.login');
    }

    public function showRegister()
    {
        if (auth()->check()){
          return redirect('/home');
        }
        $titles = User::all();
        return view('auth.register', compact('titles'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        // dd($credentials);

        if(Auth::attempt($credentials))
        {
            return redirect()->intended('/home');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function register(Request $request)
    {


        //  dd($request->all());


        $request->validate([
            'title'=> 'required|in:Dr,Mr,Miss',
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:6|confirmed',
            'mobile'=> 'nullable|string',
            'country'=> 'nullable',


        ]);


        $user = User::create([
            'title'=>$request->title,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'mobile'=> $request->mobile,
            'country'=> $request->country,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');

        // dd("you are in function");
        Session::flash('success', 'Registration Successfully');

         Auth::login($user);

         return redirect('home');

    }

    public function logout()
    {
       Auth::logout();
    //    $request->session()->invalidate();
    //    $request->session()->regenerateToken();
       return redirect('/auth/login');
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    // Send OTP to user's email
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $otp = rand(100000, 999999); // Generate 6-digit OTP
        $expiresAt = now()->addMinutes(10); // OTP expires in 10 minutes

        // Insert or update OTP in DB
        DB::table('password_otps')->updateOrInsert(
            ['email' => $request->email],
            [
                'otp'        => $otp,
                'expires_at' => $expiresAt,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Send OTP via email
        Mail::raw("Your OTP to reset your password is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Password Reset OTP');
        });

        return apiResponse(null, 'OTP has been sent to your email.');
    }

    //  Verify OTP and reset password
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email|exists:users,email',
            'otp'                   => 'required|digits:6',
            'password'              => 'required|string|min:8|confirmed',
        ]);

        $otpRecord = DB::table('password_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$otpRecord) {
            return apiResponse(null, 'Invalid OTP.', false, 400);
        }

        if (Carbon::parse($otpRecord->expires_at)->isPast()) {
            return apiResponse(null, 'OTP has expired.', false, 400);
        }

        // Reset password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Remove OTP after use
        DB::table('password_otps')->where('email', $request->email)->delete();

        return apiResponse(null, 'Password has been reset successfully.');
    }
}

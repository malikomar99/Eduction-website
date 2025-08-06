<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Auth;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationVerificationCode;
use App\Models\LoginSetting;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required",
            "device_name" => "required",
        ]);
        $user = User::where('email', $request->email)->first();
        // check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials',
            ], 401);
        }
        $devices = PersonalAccessToken::where('tokenable_id', $user->id)->count();
        // 0 means unlimited devices they can log in
        $device_limit = LoginSetting::first()->device_limit ?? 0;

        if ($device_limit > 0 && $device_limit >= $devices) {
            return response()->json([
                'status' => false,
                'message' => 'already logged in on ' . $devices . ' devices',
            ]);
        }
        // how many times user logged in
        $user->login_attempt++;
        $user->save();
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'status' => true,
            'data' => $user,
            'token' => $token,
            'message' => 'User logged in  successfully',
        ]);
    }


    public function sendRegistrationCode(Request $request)
    {
        $request->validate([
            'title' => 'required|in:Dr,Mr,Miss',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|min:6|confirmed',
            'mobile' => 'nullable|string',
            'country' => 'nullable',
        ]);

        $code = rand(100000, 999999);
        Cache::put('register:' . $request->email, ['code' => $code, 'temp_data' => $request->all()], 600);

        Mail::to($request->email)->send(new RegistrationVerificationCode($code));

        return response()->json(['message' => 'A verification code has been sent to your email.']);
    }
    public function verifyRegistrationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'code' => 'required|integer',
            'profile_picture' => 'nullable',
        ]);

        $cache = Cache::get('register:' . $request->email);

        if ($cache && $cache['code'] == $request->code) {
            $temp = $cache['temp_data'];

            // $temp['email_verified_at'] = now();
            $profile_picture=null;
            if ($request->file('profile_picture')) {
                $file = $request->file('profile_picture');
                $filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
                $file->move(public_path('uploads/profile_picture'), $filename);
                $profile_picture = 'uploads/profile_picture/' . $filename;
            }
            
            $user = User::create([
                'name' => $temp['name'] ?? '',
                'email' => $temp['email'],
                'mobile' => $temp['mobile'] ?? '',
                'password' => bcrypt($request->password),
                'email_verified_at' => now(),
                'mobile' => $temp['mobile'],
                'country' => $temp['country'],
                'profile_picture' => $profile_picture,
                'email_verified_at' => now(),
            ]);

            Cache::forget('register:' . $request->email);

            $token = $user->createToken('myAppToken')->plainTextToken;
            return response()->json([
                'message' => 'Registration successful!',
                'token' => $token,
                'user' => $user
            ]);
        } else {
            return response()->json(['message' => 'Invalid code or code has expire.'], 400);
        }
    }
    public function logout(Request $request)
    {
        $request->validate([
            'delete_from_device' => 'required|in:current_device,all_devices',
        ]);
        if ($request->delete_from_device == "current_device") {
            auth('sanctum')->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'logged out from this device']);
        }

        auth('sanctum')->user()->tokens()->delete();
        return response()->json(['message' => 'logged out from all devices']);
    }


       ///update Profile //

       public function updateProfile(Request $request)
       {
       
           // Ensure the user is authenticated
           if (!Auth::check()) {
               return response()->json(['message' => 'Unauthorized.'], 401);
           }
       
           // Define the validation rules for user information
           $validator = Validator::make($request->all(), [
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->user()->id)],
               'mobile' => ['required', 'regex:/^\+([1-9]{1}[0-9]{1,3})?([0-9]{10,15})$/', Rule::unique(User::class)->ignore(auth()->user()->id)],
               'profile_picture' => 'nullable|mimes:png,jpg,jpeg,webp,gif',  // Image file max size 10MB
           ], [
               'mobile.regex' => 'Please enter a valid phone number with a country code (e.g., +442071234567) without dashes.',
           ]);
           
           // Check if the validation fails
           if ($validator->fails()) {
               return response()->json([
                   'errors' => $validator->errors(),
               ], 422);
           }
           
           
           // Update user information
                $user = Auth::user();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->country = $request->country ?? $user->country; // Use existing country if not provided


              // Handle profile picture upload if provided
              if ($image = $request->file('profile_picture')) {
                // Delete old profile picture if it exists
                $path = $user->profile_picture;
                if (File::exists($path)) {
                    File::delete($path);
                }
        
                // Move the new profile picture to the destination folder
                $destinationPath = 'uploads/profile_picture/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
        
                // Update the profile picture path
                $user->profile_picture = $destinationPath . $profileImage;
            }
         
          
           
           // If email is changed, set the email verification to null
           if ($request->user()->isDirty('email')) {
               $user->email_verified_at = null;
           }
           
           $user->save();
           
         
       $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'country' => $user->country,
            'profile_picture' => $user->profile_picture,
        ];
           return response()->json([
               'message' => 'Profile updated successfully.',
               'user' => $userData,
           ], 200);
       }


       public function updatePassword(Request $request){

                    // Validate incoming request
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', function ($attribute, $value, $fail) {
                // Check if the provided current password matches the user's actual password
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

         // If validation fails, return error response
         if ($validator->fails()) {
             return response()->json([
                 'message' => 'Validation failed.',
                 'errors' => $validator->errors(),
             ], 422);
         }
   
           $request->user()->update([
               'password' => Hash::make($request->password),
           ]);
   
           return response()->json([
               'message' => 'Password Updated Successfully.'
           ], 200);
       }
       

       // Delete User //

       public function deleteProfile(Request $request)
       {
           // Validate password (current_password)
           $validator = Validator::make($request->all(), [
               'password' => ['required', 'current_password'],
           ]);
       
           // Check if validation fails
           if ($validator->fails()) {
               return response()->json([
                   'message' => 'Validation failed.',
                   'errors' => $validator->errors(),
               ], 422);
           }
       
           // Get the authenticated user
           $user = $request->user();
       
           // Revoke the current user's token
          $user->tokens->each(function ($token) {
              $token->delete();
          });

       
           // Delete the user
           $user->delete();
       
           // Return a success message
           return response()->json([
               'message' => 'User account deleted successfully.',
           ], 200);
       }
}

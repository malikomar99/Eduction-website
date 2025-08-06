<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessSetting;

class BusinessSettingController extends Controller
{
    
    public function edit()
    {
        $settings = BusinessSetting::first();
        return view('business_settings.edit', compact('settings'));
    }
    public function update(Request $request)
    {
        // return $request;
        // Validate the request 
        $request->validate([
            'business_name' => 'required|string|max:255',
            'business_email' => 'required|email|max:255',
            'business_phone' => 'required|string|max:20',
            'business_address' => 'required|string|max:255',
            'payment_currency' => 'required|string|max:10',
            'facebook_login' => 'nullable',
            'google_login' => 'nullable',
            'primary_color' => 'nullable|string|max:7',
            'secondary_color' => 'nullable|string|max:7',
            'maintenance_mode' => 'nullable',
            'maintenance_message' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'google_analytics_id' => 'nullable|string|max:50', 
            'copyright_text'=> 'nullable|string|max:255',
            'version_android'=> 'nullable|string|max:20',
            'version_ios' => 'nullable|string|max:20',
            'ios_url'=> 'nullable|url|max:255',
            'android_url'  => 'nullable|url|max:255',
            'force_update'=> 'nullable',
            'update_in_seven_days'=> 'nullable',
            'business_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,svg|max:2048', // Validate image file
            
        ]);
        $settings = BusinessSetting::first();
        if (!$settings) {
            $settings = new BusinessSetting();
        }

        $settings->business_name = $request->input('business_name');
        $settings->business_email = $request->input('business_email');
        $settings->business_phone = $request->input('business_phone');
        $settings->business_address = $request->input('business_address');
        $settings->payment_currency = $request->input('payment_currency');
        $settings->primary_color = $request->input('primary_color');
        $settings->secondary_color = $request->input('secondary_color');
        $settings->facebook_login = $request->has('facebook_login') ? true : false;
        $settings->google_login = $request->has('google_login') ? true : false;
        $settings->maintenance_mode = $request->has('maintenance_mode') ? true : false;
        $settings->maintenance_message = $request->input('maintenance_message');
        $settings->facebook_link = $request->input('facebook_link');
        $settings->twitter_link = $request->input('twitter_link');
        $settings->google_analytics_id = $request->input('google_analytics_id');
        $settings->copyright_text = $request->input('copyright_text');
        $settings->version_android = $request->input('version_android');
        $settings->version_ios = $request->input('version_ios');
        $settings->ios_url = $request->input('ios_url');
        $settings->android_url = $request->input('android_url');
        $settings->force_update = $request->has('force_update') ? true : false;
        $settings->update_in_seven_days = $request->has('update_in_seven_days') ? true : false;

        if($request->file('business_logo'))
        {
             $logoPath = public_path($settings->business_logo);
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
            $file= $request->file('business_logo');
            $filename = date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/business_setting'), $filename);
            $settings->business_logo= 'images/business_setting/'.$filename;
        }

        // Save the settings
        if ($settings->save()) {
            return redirect()->back()->with('success', 'Business settings updated successfully.');  
        }  
    }
    public function deleteLogo()
    {
        $settings = BusinessSetting::first();
        if ($settings && $settings->business_logo) {
            // Delete the logo file from the server
            $logoPath = public_path($settings->business_logo);
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
            // Update the business logo field in the database
            $settings->business_logo = null;
            $settings->save();
        }
        return redirect()->back()->with('success', 'Business logo deleted successfully.');
    }

}

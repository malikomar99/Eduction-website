<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\BusinessSetting;
use App\Http\Controllers\Controller;

class BusinessSettingController extends Controller
{
    public function index()
    {
        $settings = BusinessSetting::first();
        if (blank($settings)) {
            return apiResponse(
                null,
                'Business settings not found',
                false,
                404
            );
        }
     
        return apiResponse(
            $settings,
            'Business settings retrieved successfully',
            true,
        );
    }
}

<?php

use Carbon\Carbon;

if (!function_exists('apiResponse')) {
    function apiResponse($data = null, $message = '', $status = true, $code = 200)
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }
}




if (!function_exists('humanize_date')) {
    function humanize_date($datetime, $format = 'F j, Y \a\t g:i A')
    {
        try {
            return Carbon::parse($datetime)->format($format);
        } catch (\Exception $e) {
            return $datetime; // fallback if invalid date
        }
    }
}


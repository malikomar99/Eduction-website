<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;

class BannersController extends Controller
{
    //

    public function index(){
        try {
            // Fetch only active banners within the date range (if applicable)
            $banners = Banners::where('status', 1)
                ->get();

            if ($banners->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No active banners found.',
                    'data' => []
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Active banners retrieved successfully.',
                'data' => $banners
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error fetching banners: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching banners.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}

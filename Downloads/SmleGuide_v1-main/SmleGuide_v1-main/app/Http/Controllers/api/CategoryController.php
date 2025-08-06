<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data=Category::get();
        if(!blank($data))
        {
            return apiResponse($data, 'data retrieved successfully');
           
        }
        return apiResponse([], 'data not found', false, 404);
    }
    public function show($id)
    {
        $category = Category::with('courses')->find($id);
    
        if (!$category) {
            return apiResponse(null, 'Category not found', false, 404);
        }
    
        return apiResponse($category, 'Category retrieved successfully');
    }
}

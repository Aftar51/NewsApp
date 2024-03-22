<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
    //get all category
    try {
        $category = Category::latest()->get();

        return ResponseFormatter::success(
            $category, 'data Category Berhasil Di Ambil'
        );
    } catch (\Exception $error) {
        return ResponseFormatter::error([
            'message' => 'something went wrong',
            'error' => $error
        ], 'Authentication Failed', 500);
    }
    }

    public function show($id) {
        try {
            //get data by id
            $category = Category::findOrFail($id);
            return ResponseFormatter::success(
                $category, 'Data category by id'
            );
        } catch (\Exception $error) {
            return ResponseFormatter::error([
                'message' => 'something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}

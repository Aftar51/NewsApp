<?php

namespace App\Http\Controllers\API;

use App\Models\News;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\TryCatch;

class NewsContoller extends Controller
{
    public function index() {
        try {
            $news = News::latest()->get();
            return ResponseFormatter::success(
                $news, 'Data list of news'
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
            $news = News::findOrFail($id);
            return ResponseFormatter::success(
                $news, 'Data news by id'
            );
        } catch (\Exception $error) {
            return ResponseFormatter::error([
                'message' => 'something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}

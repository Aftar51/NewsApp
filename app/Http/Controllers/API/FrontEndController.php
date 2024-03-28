<?php

namespace App\Http\Controllers\API;

use App\Models\News;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    public function index()
    {
        //get carosel from news
        try {
            $news = News::latest()->limit(3)->get();
            return ResponseFormatter::success(
                $news,
                'Data list of news'
            );
        } catch (\Exception $error) {
            return ResponseFormatter::error([
                'message' => 'something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}

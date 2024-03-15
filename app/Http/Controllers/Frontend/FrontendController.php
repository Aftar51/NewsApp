<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        //get data category
        $category = Category::latest()->get();

        return view('frontend.news.index', compact(
            'category'
        ));
    }
}

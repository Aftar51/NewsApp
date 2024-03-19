<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        //get data category
        $category = Category::latest()->get();
        //slider news latest
        $sliderNews = News::latest()->limit(3)->get();

        return view('frontend.news.index', compact(
            'category',
            'sliderNews',
        ));
    }

    public function detailNews($slug){

        // get data category
        $category = Category::latest()->get();

        //get data news
        $news = News::where('slug', $slug)->first();

        return view('frontend.news.detail', compact(
            'category',
            'news'
        ));
    }

    public function detailCategory($slug){
        // get data category
        $category = Category::latest()->get();

        // get data category by slug
        $detailCategory = Category::where('slug', $slug)->first();

        //get data news by category
        $news = News::where('category_id', $detailCategory)->latest()->get();

        return view('frontend.news.detail-category', compact(
            'category',
            'detailCategory',
            'news'
        ));
    }
}

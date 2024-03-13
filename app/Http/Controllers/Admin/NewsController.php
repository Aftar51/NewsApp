<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'News - Index';
        $news = News::latest()->paginate(5);
        $category = Category::all();
        return view('home.news.index', compact(
            'title',
            'news',
            'category'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'News - Index';

        $category = Category::all();

        return view('home.news.create', compact(
            'title',
            'category'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        //fungsi untuk menimpan image ke dalam foder public/news
        //fungsi hashName() berfungsi untuk memberikan nama acak pada image
        $image->storeAs('public/news', $image->hashName());

        //create data ke dalam table news
        News::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $image->hashName(),
            'content' => $request->content
        ]);

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'News - Show';
        $news = News::findOrFail($id);
        return view('home.news.show', compact(
            'title',
            'news'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $category = Category::all();
        $title = 'News - Edit';

        return view('home.news.edit', compact(
            'title',
            'news',
            'category'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //vaidate
        $this->validate($request, [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120'
        ]);

        //get data by id
        $news = News::findOrFail($id);

        //juka tidak ada image yang di uplode
        if ($request->file('image') == "") {
            //update data
            $news->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'content' => $request->content
            ]);
        } else {
            //hapus old image
            Storage::disk('local')->delete('public/news/' . basename($news->image));
            
            //upload news image
            $image = $request->file('image');
            $image->storeAs('public/news', $image->hashName());

            //update data.
            $news->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'slug' => Str::slug($request->title),
                'image' => $image->hashName(),
                'content' => $request->content
            ]);
        }

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get data by id
        $news = News::findOrFail($id);

        //delete image
        Storage::disk('local')->delete('public/news/') . basename($news->image);

        //delete data
        $news->delete();

        return redirect()->route('news.index');
    }
}

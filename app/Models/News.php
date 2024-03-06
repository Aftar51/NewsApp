<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // fillable fields
    // fillable itu untuk mengizinkan field mana saja yang boleh diisi
    // jika tidak diatur maka semua field akan diisi
    // field yang diisi adalah category_id, title, image, slug, content
    // category_id itu untuk id kategori
    // title itu untuk judul berita
    // image itu untuk gambar berita
    // slug itu untuk judul berita 
    // yang diubah menjadi huruf kecil dan dipisahkan dengan tanda -
    // content itu untuk isi berita
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'slug',
        'content'
    ];

    // function relationship with category
    public function category(){
        // one to many relationship using belongsTo
        // maksud dari belongsTo adalah
        // satu berita hanya dimiliki oleh satu kategori
        return $this->belongsTo(Category::class);
    }

    // Accessor Image News
    // Berfungsi untuk memperoleh url image
    // Dari direktori storage/news
    public function image() : Attribute{
        return Attribute::make(
            get: fn($value) => asset('/storage/news/' . $value)
        );
    }
}

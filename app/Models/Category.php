<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // fillable fields
    // fillable itu untuk mengizinkan field mana saja yang boleh diisi
    // jika tidak diatur maka semua field akan diisi
    //  field yang diisi adalah name, slug, image
    // name itu untuk nama kategori
    // slug itu untuk nama kategori 
    // yang diubah menjadi huruf kecil dan dipisahkan dengan tanda -
    // image itu untuk gambar kategori
    protected $fillable = [
        'name',
        'slug',
        'image'
    ];

    // function relationship with news
    public function news(){
        // one to many relationship using hasMany
        // maksud dari hasMany adalah
        // satu kategori memiliki banyak berita
        return $this->hasMany(News::class);
    }

    // Accessor Image Category
    // Berfungsi untuk memperoleh url image
    // Dari direktori storage/category
    public function image() : Attribute{
        return Attribute::make(
            get: fn($value) => asset('/storage/category/' .  $value)
        );
    }
}

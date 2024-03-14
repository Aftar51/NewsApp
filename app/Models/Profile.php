<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'image'
    ];

    // relasi to user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Accessor Image profile
    public function Image() : Attribute{
        return Attribute::make(
            get: fn($value) => asset('/storage/profile/' . $value)
        );
    }
}

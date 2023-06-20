<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;


class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'description',
        'slug',
        'status',
        'Is_deleted',
    ];

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }

}

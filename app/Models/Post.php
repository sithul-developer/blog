<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'sub_title',
        'content',
        'option',
        'orders',
        'category_id',
        'status',
        'Is_deleted',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function user()
    {
        // user_id,
        // author_id
        return $this->belongsTo(User::class);
    }


    public function  getImage()
    {
        if (!empty($this->image && file_exists('media/' .$this->image))) {
            return url('media/' .$this->image);
        } else {
            return "";
        }
    }
}

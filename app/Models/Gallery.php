<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'description',
        'orders',
        'status',
        'Is_deleted',
    ];
    public function  getImage()
    {
        if (!empty($this->image && file_exists('media/' .$this->image))) {
            return url('media/' .$this->image);
        } else {
            return "";
        }
    }
}

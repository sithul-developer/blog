<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'description',
        'status',
        'Is_deleted',
    ];

    public function  getImage()
    {
        if (!empty($this->image && file_exists('./assets/admin/uploads/image/' .$this->image))) {
            return url('./assets/admin/uploads/image/' .$this->image);
        } else {
            return "";
        }
    }
}

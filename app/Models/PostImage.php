<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'image_path',
        'image_name'
    ];

    protected $table = 'post_images';

    public function post(){
        return $this->hasOne(Post::class, 'post_id');
    }
}

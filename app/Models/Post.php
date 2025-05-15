<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
     use HasFactory, SoftDeletes;

    protected $table = 'post';

    protected $fillable = [
        'title',
        'description',
        'date',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'admin_id');
    }

     public function postImage(){
        return $this->hasOne(PostImage::class, 'post_id');
    }
}

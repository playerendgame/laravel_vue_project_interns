<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'table_categories';

    protected $fillable = [
        'id',
        'category_name',
    ];

    public function post(){
        return $this->hasOne(Post::class, 'category_id');
    }
    
}

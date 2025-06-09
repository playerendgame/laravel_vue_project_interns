<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $table = 'profile_info';

    protected $fillable = [
        'user_id',
        'birthday',
        'contact',
        'address',
        'image_path',   
        'image_name'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

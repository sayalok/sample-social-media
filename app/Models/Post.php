<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    
    protected $table = 'post';
    
    protected $fillable = [
        'user_id',
        'post_content',
    ];
}





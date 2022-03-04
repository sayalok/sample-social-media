<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PagePost extends Model
{
    use SoftDeletes;
    
    protected $table = 'page_post';
    
    protected $fillable = [
        'user_id',
        'page_id',
        'post_content',
    ];
}





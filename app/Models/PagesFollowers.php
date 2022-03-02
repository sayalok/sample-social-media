<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PagesFollowers extends Model
{
    use SoftDeletes;
    
    protected $table = 'page_follower';
    
    protected $fillable = [
        'user_id',
        'pages_id',
    ];
}





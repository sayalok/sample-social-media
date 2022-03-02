<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pages extends Model
{
    use SoftDeletes;
    
    protected $table = 'pages';
    
    protected $fillable = [
        'page_name',
        'user_id',
    ];
}





<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PersonFollowers extends Model
{
    use SoftDeletes;
    
    protected $table = 'person_follower';
    
    protected $fillable = [
        'user_id',
        'followers_id',
    ];
}





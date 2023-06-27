<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'age',
        'facebook_link',
        'instagram_link',
        'relationship_status',
        'public'
    ];

   

}

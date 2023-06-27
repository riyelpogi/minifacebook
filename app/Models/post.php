<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class post extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'user_id',
        'subject'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function comments(){
        return $this->hasMany(comments::class)->orderBy('created_at', 'desc');
    }
}

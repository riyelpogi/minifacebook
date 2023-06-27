<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'bio',
        'displaypicture',
        'password',
        'active_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function receivesBroadcastNotificationsOn()
    {
        return "Users.".$this->id;
    }
    public function posts(){
        return $this->hasMany(post::class)->orderBy('created_at', 'DESC');
    }
    
    public function comments(){
        return $this->belongsTo(comments::class, 'user_id');
    }

    public function userinfos()
    {
        return $this->hasOne(userInfo::class);
    }

    public function photos()
    {
        return $this->hasMany(Photos::class);
        
    }

    public function messages(){
        return $this->hasMany(AnonymousMessage::class, 'to_user_id', 'id');
    }

}

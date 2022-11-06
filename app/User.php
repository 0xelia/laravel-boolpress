<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_pic'
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCreateDateAttribute(){
        return Carbon::parse($this->created_at)->format('d M Y'); 
    }
    public function getUpdateDateAttribute(){
        return Carbon::parse($this->updated_at)->format('d M Y'); 
    }

    public function getProfilePicPathAttribute(){
        return $this->profile_pic ? Storage::url($this->profile_pic) : null;
    }

    protected $appends = ['profile_pic_path'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

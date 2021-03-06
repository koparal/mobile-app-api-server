<?php

namespace App;

use App\Models\Cv;
use App\Models\Role;
use App\Models\UserExtra;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cv()
    {
        return $this->hasOne(Cv::class,'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function extras()
    {
        return $this->hasMany(UserExtra::class, "user_id");
    }

    public function isAdmin()
    {
        if($this->role_id == 1){
            return true;
        }
        return false;
    }
}

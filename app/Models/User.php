<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        'code',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'date' => 'date'
    ];

    public function withToken()
    {
        return $this->makeVisible(['api_token']);
    }

    public static function registerRules()
    {
        return [
            'name' => 'max:255|required',
            'email' => 'email|required|unique:users',
            'password' => 'min:4|required',
        ];
    }

    public static function loginRules()
    {
        return [
            'email' => 'email|required',
            'password' => 'required',
        ];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setPictureAttribute($value)
    {
        if (is_file($value)) {
            $this->attributes['picture'] = ImageHelper::saveImage($value, 'images/user');
        } else if (is_string($value)) {
            $this->attributes['picture'] = ImageHelper::saveImageFromApi($value, 'images/user');
        } else {
            $this->attributes['picture'] = "images/user/default.png";
        }
    }

    public function getPictureAttribute($value)
    {
        return asset($value);
    }
}

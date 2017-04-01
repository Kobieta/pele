<?php

namespace App;


use App\Notifications\ResetUserPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
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
     * Generates random user password
     *
     * @return string
     */
    public function generateRandomPassword()
    {

        $length = 10;

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-+=_,!@$#*%";

        $password = substr( str_shuffle( $chars ), 0, $length );

        return $password;
    }

    /**
     * Sends password reset notification
     *
     * @param string $token
     *
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetUserPassword($token));
    }
}

































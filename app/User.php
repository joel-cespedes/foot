<?php

namespace App;

use App\Notifications\ResetearPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const ADMIN ='11';
    const ADM_NORMAL ='10';

    protected $table = "users";
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'adm'
    ];

    public function esAdm(){
        return $this->adm = User::ADMIN;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetearPassword($token));
    }

}

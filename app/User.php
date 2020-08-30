<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

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

    // adding the relationships
    public function issues(){
        return $this->hasMany('App\issue\issue');
    }
    //  check if the user is an admin or a customer
    public function isAdmin()
    {
        return $this->rool == "admin";
    }

    public function isCustomer()
    {
        return $this->rool == "customer";
    }

    public function admins()
    {
        return $this->where('rool','admin')->get();
    }


}

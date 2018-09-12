<?php

namespace App;

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

    public function getEmail ()
    {
        return $this->email;
    }
    public function getFullName() 
    {
        return $this->fullName;
    }
    public function getOccupation()
    {
        return $this->occupation;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function isAuthenticated() {

        return $this->id == auth()->id();

    }
}

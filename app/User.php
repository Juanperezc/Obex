<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //* esto!!
    protected $appends = ['test'];
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
    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }
    public function charge()
    {
        return $this->hasMany('App\Charge');
    }
    //! serialization ohh yea 
    public function getTestAttribute()
    {
        return "test";
    }

}

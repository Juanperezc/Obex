<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\ExposePermissions;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;
    use ExposePermissions;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //* esto!!
    protected $dates = ['deleted_at'];
    protected $appends = ['test','can'];
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

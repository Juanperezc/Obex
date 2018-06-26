<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\ExposePermissions;
use App\Traits\UserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;
    use ExposePermissions;
    use SoftDeletes;
    use UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //* esto!!
  //  protected $dateFormat = 'U';
    protected $dates = ['deleted_at'];
    protected $appends = ['test','can','section'];
    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];
    //protected $dateFormat = 'U';

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
    public function leader()
    {
        return $this->hasMany('App\Team', 'leader_id');
    }
  
  
}

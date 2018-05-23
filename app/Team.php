<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Team extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

}

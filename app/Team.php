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
    protected $hidden = [
        'activities'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function projects()
    {
        return $this->belongsToMany('App\Project','activity_project_team')->withPivot('activity_id');
    }
    public function activities()
    {
        return $this->belongsToMany('App\Activity','activity_project_team')->withPivot('project_id')->as('subscription');
    }

}

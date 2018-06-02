<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Activity extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function teams()
    {
       return $this->belongsToMany('App\Team','activity_project_team')->withPivot('project_id');
    }
    public function project()
    {
       return $this->belongsToMany('App\Project','activity_project_team')->withPivot('team_id');
    }
}

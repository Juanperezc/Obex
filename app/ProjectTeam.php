<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    //
    public function project(){
        $this->belongsTo('App\Project');
    }
    public function team(){
        $this->belongsTo('App\Team');
    }
    public function activities(){
        $this->hasMany('App\Activity');
    }
}

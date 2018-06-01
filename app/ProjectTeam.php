<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ProjectTeam extends Pivot
{
    //
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
   
}

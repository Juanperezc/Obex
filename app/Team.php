<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TeamTrait;
class Team extends Model
{
    //
    use SoftDeletes;
    use TeamTrait;
    protected $dates = ['deleted_at'];
    protected $appends = ['section'];
    protected $fillable = [
        'description'
    ];
  /*  protected $hidden = [
        'activities'
    ]; */
//*makevisible
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

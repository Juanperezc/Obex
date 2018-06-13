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
        'id', 'description'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function leader(){
        return $this->belongsTo('App\User', 'leader');
    }
    public function work_area(){
        return $this->belongsTo('App\Work_Area', 'work_area');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }


}

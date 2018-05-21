<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ProjectTrait;
class Project extends Model
{
    use ProjectTrait;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $appends = ['percent_complete','section'];
    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }
    public function clients(){
    return $this->belongsTo('App\Client', 'client_id');
    }
    
}

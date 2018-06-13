<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ActivityTrait;
class Activity extends Model
{
    //
    use SoftDeletes;
    use ActivityTrait;
    protected $dates = ['deleted_at'];
    protected $appends = ['status'];
    public function teams()
    {
       return $this->belongsTo('App\Team');
    }

}

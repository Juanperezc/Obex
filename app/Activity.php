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
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
        'start' => 'datetime:d-m-Y',
        'finish' => 'datetime:d-m-Y'
    ];
    protected $dates = ['deleted_at'];
    protected $appends = ['status'];
    public function team()
    {
       return $this->belongsTo('App\Team');
    }

}

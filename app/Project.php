<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ProjectTrait;
class Project extends Model
{
    use ProjectTrait;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
        'start' => 'datetime:d-m-Y',
        'finish' => 'datetime:d-m-Y'
    ];
    protected $fillable = ['name', 'description', 'type', 'start', 'finish'];
    protected $dates = ['deleted_at'];
    protected $guarded = ['client_id'];
    protected $appends = ['percent_complete','section'];
    public function teams()
    {
       return $this->hasMany('App\Team');
    }
    public function clients(){
    return $this->belongsTo('App\Client', 'client_id');
    }
   

}

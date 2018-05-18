<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $appends = ['percent_complete'];
    protected $fillable = [
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

     //! serialization ohh yea 
     public function getPercentCompleteAttribute()
     {
        /* $conte = 0;
         $contg = 0;
foreach ($this->activities() as $key => $value) {
    # code...
}*/
         
         return "test";
     }

}

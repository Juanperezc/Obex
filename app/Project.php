<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $appends = ['percent_complete'];
    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }
    public function clients(){
    return $this->hasMany('App\Client');
    }
         //! serialization ohh yea 
         public function getPercentCompleteAttribute()
         {
             $conte = 0;
             $contg = 0;
          foreach ($this->teams as $t) {
          # code...
          $contg+= count($t->activities);
           foreach ($t->activities as $a) {
            if ($a->state == "culminated")
            $conte++;
           }
          }
             if ($contg != 0)
             return $conte * (100/$contg);
             else
             return 0;
         }

}

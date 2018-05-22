<?php

namespace App\Traits;


Trait ProjectTrait{
     //! serialization ohh yea 
     public function getPercentCompleteAttribute()
     {
         $conte = 0;
         $contg = 0;
      foreach ($this->teams as $t) {
      # code...
       foreach ($t->activities as $a) {
        if ($a->state != "cancelled" ) 
        $contg++;
        if ($a->state == "culminated" ) 
        $conte++;
       }
      }
         if ($contg != 0)
         return $conte * (100/$contg);
         else
         return 0;
     }
     public function getSectionAttribute()
     {
     return "project";
     }

}
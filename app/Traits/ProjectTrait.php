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
     public function getSectionAttribute()
     {
     return "project";
     }

}
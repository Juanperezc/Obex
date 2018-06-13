<?php

namespace App\Traits;


Trait ActivityTrait{
     //! serialization ohh yea 
    
     public function getStatusAttribute()
     {
         
      switch($this->state){
          case "on-hold":
          return "En Espera";
          break;
          case "in-progress":
          return "En Progreso";
          break;
          case "culminated":
          return "Finalizado";
          break;
          case "cancelled":
          return "Cancelado";
          break;

      }

     }
 

}
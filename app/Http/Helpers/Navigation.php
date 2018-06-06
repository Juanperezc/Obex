<?php
use Illuminate\Support\Collection;

function strafter($string, $substring) {
    $pos = strpos($string, $substring);
    if ($pos === false)
     return $string;
    else  
     return(substr($string, $pos+strlen($substring)));
  }
  
  function strbefore($string, $substring) {
    $pos = strpos($string, $substring);
    if ($pos === false)
     return $string;
    else  
     return(substr($string, 0, $pos));
  } 

    function isActiveRoute($route, $output = 'active')
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }
    function areActiveRoutes(Array $routes, $output = "active")
    {
    foreach ($routes as $route)
    {
        if (Route::currentRouteName() == $route) return $output;
    }
    }
 
    function getHeading()
    {
  
        $routes = Route::currentRouteName();
        $br = strbefore($routes,'.'); //result 'Christ'
        $ar =  strafter($routes,'.');
        $output = new Collection();
        $prefix = new stdClass();
        $current = new stdClass();
        $prefix->name  = ucfirst($br);
        $prefix->routeurl = $routes;
        $prefix->class = "";
        $output->push($prefix);
        $current->name = ucfirst($ar);
        $current->routeurl = $routes;
        $current->class = "active";
        $output->push($current);
 
   
     
      //  
        return $output;
    }
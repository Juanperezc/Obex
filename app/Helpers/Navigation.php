<?php

class Navigation
{
    public static function isActiveRoute($route, $output = 'active')
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }
    public static function areActiveRoutes(Array $routes, $output = "active")
    {
    foreach ($routes as $route)
    {
        if (Route::currentRouteName() == $route) return $output;
    }
    }
    
}

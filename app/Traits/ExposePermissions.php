<?php

namespace App\Traits;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Support\Facades\Auth;

Trait ExposePermissions
{
   /**
     * Get all user permissions.
     *
     * @return bool
     */
  /*  public function getAllPermissionsAttribute()
    {
        return $this->getAllPermissions();
    }*/
    
     /**
     * Get all user permissions in a flat array.
     *
     * @return array
     */
    public function getCanAttribute()
    {
        $permissions = [];
        foreach (Permission::all() as $permission) {
            if (Auth::user()->hasPermission($permission->slug)) {
                $permissions[$permission->slug] = true;
            } else {
                $permissions[$permission->slug] = false;
            }
        }
        return $permissions;
       // return Permission::all();
    }

}
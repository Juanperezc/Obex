<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    /**
	     * Add Permissions
	     *
	     */
        /*if (Permission::where('name', '=', 'Can View Users')->first() === null) {
			Permission::create([
			    'name' => 'Can View Users',
			    'slug' => 'view.user',
			    'description' => 'Can view users',
			    'model' => 'Permission',
			]);
        }*/

        if (Permission::where('name', '=', 'Can Create Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Create Users',
			    'slug' => 'create.user',
			    'description' => 'Can create new users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('name', '=', 'Can Edit Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Edit Users',
			    'slug' => 'edit.user',
			    'description' => 'Can edit users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('name', '=', 'Can Delete Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Delete Users',
			    'slug' => 'delete.user',
			    'description' => 'Can delete users',
			    'model' => 'Permission',
			]);
        }


		
    }
}

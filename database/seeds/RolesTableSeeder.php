<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		//* Permisos */



		$createProjectPermission = Permission::create([
			'name' => 'Create Projects',
			'slug' => 'create.projects',
			'description' => '', // optional
		]);
		
		$deleteProjectPermission = Permission::create([
			'name' => 'Delete Projects',
			'slug' => 'delete.projects',
		]);



	    /**
	     * Add Roles
	     *
	     */
    	if (Role::where('name', '=', 'Admin')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Admin',
	            'slug' => 'admin',
	            'description' => 'Admin Role',
	            'level' => 5,
			]);
			$adminRole->attachPermission($createProjectPermission); // permission attached to a role
			$adminRole->attachPermission($deleteProjectPermission); // permission attached to a role

	    }

    	if (Role::where('name', '=', 'Employee')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Employee',
	            'slug' => 'employee',
	            'description' => 'User Role',
	            'level' => 5,
	        ]);
	    }

    	if (Role::where('name', '=', 'Manager')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Manager',
	            'slug' => 'manager',
	            'description' => 'Proyect-Manager',
	            'level' => 5,
	        ]);
		}
		if (Role::where('name', '=', 'Secretary')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Secretary',
	            'slug' => 'secretary',
	            'description' => 'Secretary',
	            'level' => 5,
	        ]);
		}
		/* Mercadeo y postventa */ 
		if (Role::where('name', '=', 'Marketing')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Marketing',
	            'slug' => 'marketing',
	            'description' => 'marketing',
	            'level' => 5,
	        ]);
		}
		if (Role::where('name', '=', 'Post-sale')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Post-sale',
	            'slug' => 'post-sale',
	            'description' => 'post-sale',
	            'level' => 5,
	        ]);
	    }

    }

}
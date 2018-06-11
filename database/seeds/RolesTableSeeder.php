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



		$viewProjectPermission = Permission::create([
			'name' => 'View Projects',
			'slug' => 'view.project',
			'description' => '', // optional
		]);
		$editProjectPermission = Permission::create([
			'name' => 'Edit Projects',
			'slug' => 'edit.project',
		]);
		$deleteProjectPermission = Permission::create([
			'name' => 'Delete Projects',
			'slug' => 'delete.project',
		]);
		//? Teams
		$viewTeamPermission = Permission::create([
			'name' => 'View Projects',
			'slug' => 'view.team',
			'description' => '', // optional
		]);
		$editTeamPermission = Permission::create([
			'name' => 'Edit Projects',
			'slug' => 'edit.team',
		]);
		$deleteTeamPermission = Permission::create([
			'name' => 'Delete Projects',
			'slug' => 'delete.team',
		]);
		//? WArea
	/*	$viewWAreaPermission = Permission::create([
			'name' => 'View Projects',
			'slug' => 'view.area',
			'description' => '', // optional
		]);*/
		$editWAreaPermission = Permission::create([
			'name' => 'Edit Projects',
			'slug' => 'edit.area',
		]);
		$deleteWAreaPermission = Permission::create([
			'name' => 'Delete Projects',
			'slug' => 'delete.area',
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
			$adminRole->attachPermission($viewProjectPermission); // permission attached to a role
			$adminRole->attachPermission($editProjectPermission); // permission attached to a role
			$adminRole->attachPermission($deleteProjectPermission); // permission attached to a role
			$adminRole->attachPermission($viewTeamPermission); // permission attached to a role
			$adminRole->attachPermission($editTeamPermission); // permission attached to a role
			$adminRole->attachPermission($deleteTeamPermission); // permission attached to a role
			//$adminRole->attachPermission($viewWAreaPermission); // permission attached to a role
			$adminRole->attachPermission($editWAreaPermission); // permission attached to a role
			$adminRole->attachPermission($deleteWAreaPermission); // permission attached to a role


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
	            'description' => 'Project-Manager',
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
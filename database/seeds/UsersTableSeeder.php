<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $adminRole 	= Role::where('name', '=', 'Admin')->first();
		$employeeRole 	= Role::where('name', '=', 'Employee')->first();
		$projectMRole	= Role::where('name', '=', 'Manager')->first();
		$permissions 		= Permission::all();

	    /**
	     * Add Users
	     *
	     */
        if (User::where('email', '=', 'admin@obex.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'Admin',
	            'email' => 'admin@obex.com',
	            'password' => bcrypt('password'),
	        ]);

	        $newUser->attachRole($adminRole);
			foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}

        }

        if (User::where('email', '=', 'user@obex.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'User',
	            'email' => 'user@obex.com',
	            'password' => bcrypt('password'),
	        ]);

			$newUser->attachRole($employeeRole );
			foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}

		}
		if (User::where('email', '=', 'projectmanager@obex.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'Project-Manager',
	            'email' => 'projectmanager@obex.com',
	            'password' => bcrypt('password'),
	        ]);
			$newUser->attachRole($projectMRole);
			foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}

        }

    }
}
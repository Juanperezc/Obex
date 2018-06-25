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
				'doc_id' => '25141826',
				'name' => 'Juan',
				'last_name' => 'Perez',
	            'email' => 'admin@obex.com',
				'password' => bcrypt('password'),
				'profile_img' => 'a1.png',
				'charge' => 1
	        ]);

	        $newUser->attachRole($adminRole);
		/*	foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}
*/
        }

        if (User::where('email', '=', 'user@obex.com')->first() === null) {

	        $newUser = User::create([
				'doc_id' => '25141827',
				'name' => 'Marco',
				'last_name' => 'Saenz',
	            'email' => 'user@obex.com',
				'password' => bcrypt('password'),
				'profile_img' => 'a2.png',
				'charge' => 1
	        ]);

			$newUser->attachRole($employeeRole );
			/*foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}*/

		}
		if (User::where('email', '=', 'projectmanager@obex.com')->first() === null) {

	        $newUser = User::create([
				'doc_id' => '25141828',
				'name' => 'Marco',
				'last_name' => 'Padua',
	            'email' => 'projectmanager@obex.com',
				'password' => bcrypt('password'),
				'profile_img' => 'a3.png',
				'charge' => 1
	        ]);
			$newUser->attachRole($projectMRole);
			/*foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}*/

        }

    }
}
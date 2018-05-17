<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('WorkAreasTableSeeder');
        $this->call('ChargeTableSeeder');
        $this->call('ClientTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('ConnectRelationshipsSeeder');
        $this->call('UsersTableSeeder');
        $this->call('TeamsTableSeeder');
        $this->call('ProjectTableSeeder');
    }
}

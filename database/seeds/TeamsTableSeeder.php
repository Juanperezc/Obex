<?php

use Illuminate\Database\Seeder;
use App\Team;
class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newTeam = Team::create([
            1 , 'description' => 'First',
        ]);
        $newTeam = Team::create([
            2 , 'description' => 'Second',
        ]);
    }
}

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
            'description' => 'First',
        ]);
        $newTeam = Team::create([
            'description' => 'Second',
        ]);
    }
}

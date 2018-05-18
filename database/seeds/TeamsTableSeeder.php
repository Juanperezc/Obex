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
        $newTeam = Team::create(['description' => 'First', 'leader' => 1 , 'work_area' => 1
        ]);
        
        $newTeam = Team::create(['description' => 'Second', 'leader' => 1 , 'work_area' => 2
        ]);
        $newTeam = Team::create(['description' => 'Test', 'leader' => 1 , 'work_area' => 2
        ]);
    }
}

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
        $newTeam = Team::create(['name' => 'First', 'description' => 'First', 'leader_id' => 1 , 'work_area_id' => 1
        ]);
        $newTeam = Team::create(['name' => 'Second', 'description' => 'Second', 'leader_id' => 3 , 'work_area_id' => 2
        ]);
        $newTeam = Team::create(['name' => 'Third', 'description' => 'Test', 'leader_id' => 1 , 'work_area_id' => 2
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Team;
class ActivityTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = Team::findOrFail(1);
        $t2 = Team::findOrFail(2);
     //   $t3 = Team::findOrFail(2);
        
        //! attach //
        $t1->activities()->attach([1,2]); // activity 1 to team 
        $t2->activities()->attach([3,4]); // activity 1 to team 1
     //   $pt2->activities()->attach(2, ['team_id'=> 2]); // activity 1 to team 1
        //$pt2->activities()->attach(3, ['team_id'=> 1]); // activity 1 to team 1
       // $pt2->activities()->attach(1,[2,3]); //activity 1 to team 2,3
     //   $project->activities()->attach(1,['team_id'=>'1']);
    }
}

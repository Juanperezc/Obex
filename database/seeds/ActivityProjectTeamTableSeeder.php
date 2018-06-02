<?php

use Illuminate\Database\Seeder;
use App\Project;
class ActivityProjectTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pt1 = Project::findOrFail(1);
        $pt2 = Project::findOrFail(2);
        
        //! attach //
        $pt1->activities()->attach(1, ['team_id'=> 1]); // activity 1 to team 
        //? ejemplo clave unica entre 3  $pt1->activities()->attach(1, ['team_id'=> 1]); // activity 1 to team 1
        $pt2->activities()->attach(1, ['team_id'=> 1]); // activity 1 to team 1
        $pt2->activities()->attach(2, ['team_id'=> 2]); // activity 1 to team 1
        //$pt2->activities()->attach(3, ['team_id'=> 1]); // activity 1 to team 1
       // $pt2->activities()->attach(1,[2,3]); //activity 1 to team 2,3
     //   $project->activities()->attach(1,['team_id'=>'1']);
    }
}

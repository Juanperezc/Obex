<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Team;
use Carbon\Carbon;
class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project1t = Team::whereIn('id', [1])->get();
        $project2t = Team::whereIn('id', [2, 3])->get();

        $project1 = Project::create(['name' => 'Test1', 'type' => 'web-design', 'description' => 'Lorem ipsu'
        , 'start' => Carbon::parse('2000-01-01'), 'finish' => Carbon::parse('2000-02-02')
    ,'state' => 'in-progress', 'client_id' => 1
        ]);
         // activity 1 to team 
       // $project1->clients()->attach([1]);
        $project2 = Project::create(['name' => 'Test2', 'type' => 'web-design', 'description' => 'Lorem ipsu'
        , 'start' => Carbon::parse('03/10/2017'), 'finish' => Carbon::parse('05/10/2018')
    ,'state' => 'in-progress', 'client_id' => 1
        ]);
        $project1->teams()->saveMany($project1t);
        $project2->teams()->saveMany($project2t); // activity 1 to team 1
      //  $project1->clients()->attach([1]);
        //
    }
}

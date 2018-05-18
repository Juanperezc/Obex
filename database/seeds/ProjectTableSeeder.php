<?php

use Illuminate\Database\Seeder;
use App\Project;
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
        $project1 = Project::create(['name' => 'Test1', 'type' => 'Web', 'description' => 'Lorem ipsu'
        , 'start' => Carbon::parse('2000-01-01'), 'finish' => Carbon::parse('2000-02-02')
    ,'state' => 'in-progress', 'client' => 1
        ]);
        $project2 = Project::create(['name' => 'Test2', 'type' => 'App', 'description' => 'Lorem ipsu'
        , 'start' => Carbon::parse('03/10/2017'), 'finish' => Carbon::parse('05/10/2018')
    ,'state' => 'in-progress', 'client' => 1, 'status' => 1
        ]);
        //
    }
}

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
        $project1 = Team::create(['Test1', 'Web', 'Lorem ipsu'
        , Carbon::parse('2000-01-01'), Carbon::parse('2000-02-02')
    ,'in-progress'
        ]);
        //
    }
}

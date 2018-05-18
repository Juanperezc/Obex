<?php

use Illuminate\Database\Seeder;
use App\Project;
class ProjectTeamTableSeeder extends Seeder
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
        $pt1->teams()->attach([1]);
        $pt2->teams()->attach([2]);
        //
    }
}

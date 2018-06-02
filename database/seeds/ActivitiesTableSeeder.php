<?php

use Illuminate\Database\Seeder;
use App\Activity;
use Carbon\Carbon;
class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $a1 = Activity::create(['name' => 'Test1', 'type' => 'development', 'description' => 'Lorem ipsu'
        , 'start' => Carbon::parse('2000-01-01'), 'finish' => Carbon::parse('2000-02-02')
    ,'state' => 'culminated'
        ]);
        $a2 = Activity::create(['name' => 'Test2', 'type' => 'marketing', 'description' => 'Lorem ipsu'
        , 'start' => Carbon::parse('03/10/2017'), 'finish' => Carbon::parse('05/10/2018')
    ,'state' => 'culminated'
        ]);
        $a3 = Activity::create(['name' => 'Test3', 'type' => 'marketing', 'description' => 'Lorem ipsu'
        , 'start' => Carbon::parse('03/10/2017'), 'finish' => Carbon::parse('05/10/2018')
    ,'state' => 'in-progress'
        ]);
        $a3 = Activity::create(['name' => 'Test4', 'type' => 'design', 'description' => 'Lorem ipsu'
        , 'start' => Carbon::parse('03/10/2017'), 'finish' => Carbon::parse('05/10/2018')
    ,'state' => 'in-progress'
        ]);
    }
}

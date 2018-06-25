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
        $a1 = Activity::create(['name' => 'Posicionamiento', 'type' => 'development', 'description' => 'Planificcion y posicionamiento del producto'
        , 'start' => Carbon::parse('2018-02-01'), 'finish' => Carbon::parse('2018-03-03')
    ,'state' => 'culminated', 'team_id' => 1
        ]);
        $a2 = Activity::create(['name' => 'Plan de ventas', 'type' => 'marketing', 'description' => 'Diseño de plan de ventas del producto'
        , 'start' => Carbon::parse('04-03-2018'), 'finish' => Carbon::parse('05-04-2018')
    ,'state' => 'culminated', 'team_id' => 1
        ]);
        $a3 = Activity::create(['name' => 'Pronosticos', 'type' => 'marketing', 'description' => 'Pronosticos y proyecciones de ventas'
        , 'start' => Carbon::parse('02-01-2018'), 'finish' => Carbon::parse('28-01-2018')
    ,'state' => 'in-progress', 'team_id' => 2
        ]);
        $a3 = Activity::create(['name' => 'Dieño DB', 'type' => 'design', 'description' => 'Diseño de base de datos del sistema'
        , 'start' => Carbon::parse('29-01-2018'), 'finish' => Carbon::parse('15-02-2018')
    ,'state' => 'in-progress', 'team_id' => 2
        ]);
    }
}

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
        $newTeam = Team::create(['name' => 'Alpha', 'description' => 'Equipo que se encarga del mercadeo de los proyectos', 'leader_id' => 1 , 'work_area_id' => 1
        ]);
        $newTeam = Team::create(['name' => 'Beta', 'description' => 'Equipo que se encarga del desrrollo de los proyectos', 'leader_id' => 3 , 'work_area_id' => 2
        ]);
        $newTeam = Team::create(['name' => 'Gamma', 'description' => 'Equipo que se encarga de la gestion de control de los prollectos', 'leader_id' => 1 , 'work_area_id' => 2
        ]);
    }
}

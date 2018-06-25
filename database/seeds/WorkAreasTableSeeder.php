<?php

use Illuminate\Database\Seeder;
use App\Work_Area as WA;
class WorkAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newW1 = WA::create(['name' => 'Departamento de Mercadeo', 'description' => 'Se encarga del posicionamiento de los productos en los consumidores y de contacto con el cliente en primera instancia'
        ]);
        $newW2 = WA::create(['name' => 'Departamento de Desarrollo', 'description' => 'Se encarga del desarro del los productos producidos por Obex']);
        //
    }
}

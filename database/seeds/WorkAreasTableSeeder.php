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
        $newW1 = WA::create(['name' => 'First', 'description' => 'First'
        ]);
        $newW2 = WA::create(['name' => 'Second', 'description' => 'Second']);
        //
    }
}

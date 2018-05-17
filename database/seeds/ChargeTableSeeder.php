<?php

use Illuminate\Database\Seeder;
use App\Charge;
class ChargeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newTeam = Charge::create(['name' => 'First', 'description' => 'First'
        ]);
        //
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Client;
class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newClient = Client::create(['name' => 'Pedro Perez', 'phone' => '04245869872' , 'email' => 'test@gmail.com', 'direction' => 'Lorem ipsu', 'type' => 'natural'
        ]);
        //
    }
}

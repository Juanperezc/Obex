<?php

use Illuminate\Database\Seeder;
use App\Team;
class TeamUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = Team::findOrFail(1);
        $t2 = Team::findOrFail(2);

        //! attach

        $t1->users()->attach([1]);
        $t2->users()->attach([2]);
        $t2->users()->attach([3]);
        //
    }
}

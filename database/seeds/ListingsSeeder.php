<?php

use Illuminate\Database\Seeder;

class ListingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 12; $i++) {
            $reply = new Reply();
            $reply->name = $faker->monthName;
            $reply->save();
        }
    }
}

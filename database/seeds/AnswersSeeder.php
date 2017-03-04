<?php

use Illuminate\Database\Seeder;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 111; $i++) {
            $reply = new Reply();
            $reply->name = $faker->sentence;
            $reply->save();
        }
    }
}

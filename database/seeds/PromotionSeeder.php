<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 500) as $index) {
            DB::table('promotions')->insert(
                [
                    'title' => $faker->company,
                    'price' => $faker->randomDigit,
                    'address' => $faker->address,
                    'latitude' => $faker->latitude,
                    'longitude' => $faker->longitude,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime
                ]
            );
        }
    }
}

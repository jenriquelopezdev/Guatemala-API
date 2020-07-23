<?php

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
        foreach (range(1, 500) as $index) {
            DB::table('promotions')->insert(
                [
                    'title' => 'Promotion ' . $index,
                    'price' => '10.5',
                    'address' => 'Guatemala',
                    'latitude' => '14.123456123',
                    'longitude' => '-90.545632345',
                ]
            );
        }
    }
}

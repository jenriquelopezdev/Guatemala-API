<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PromotionControllerTest extends TestCase
{

    use WithFaker;

    protected $headers = [];
    protected $promotion;
    protected $scopes = [];

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGetPromotion()
    {
        Artisan::call('passport:install');

        $this->get('/api/promotions')->assertStatus(200);
    }

    public function testPostPromotion()
    {
        Artisan::call('passport:install');

        $this->postJson('/api/promotions', [
            'title' => $this->faker->sentence,
            'price' => $this->faker->randomDigit,
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude
        ])->assertStatus(200);
    }

    public function testPutPromotion()
    {
        Artisan::call('passport:install');

        $this->postJson('/api/promotions/', [
            'title' => $this->faker->sentence,
            'price' => $this->faker->randomDigit,
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude
        ])->assertStatus(200);
    }
}

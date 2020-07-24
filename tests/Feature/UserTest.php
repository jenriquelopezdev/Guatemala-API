<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    private $password = "mypassword";

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

    public function testUserCreation()
    {

        Artisan::call('passport:install');

        $name = $this->faker->name();
        $email = $this->faker->email();

        $response = $this->postJson('/api/register', [
            'name' => $name,
            'email' => $email,
            'password' => $this->password,
            'password_confirmation' => $this->password
        ]);

        $response->assertStatus(200);
    }//testUserCreation

    public function testLogin()
    {

        Artisan::call('passport:install');

        $email = $this->faker->email();

        $response = $this->postJson('/api/login', [
            'email' => $email,
            'password' => $this->password
        ]);

        $response->assertStatus(200);
    }//testUserCreation
}

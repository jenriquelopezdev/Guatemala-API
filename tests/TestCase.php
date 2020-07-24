<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    use DatabaseTransactions;

    protected $headers = [];
    protected $scopes = [];
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');

        $this->user = factory(User::class)->create();
        $token = $this->user->createToken('TestToken', $this->scopes)->accessToken;

        $this->headers['Accept'] = 'application/json';
        $this->headers['Authorization'] = 'Bearer ' . $token;
    }

    public function get($uri, array $headers = [])
    {
        return parent::get($uri, array_merge($this->headers, $headers));
    }

    public function postJson($uri, array $data = [], array $headers = [])
    {
        return parent::postJson($uri, $data, array_merge($this->headers, $headers));
    }

    public function putJson($uri, array $data = [], array $headers = [])
    {
        return parent::putJson($uri, $data, array_merge($this->headers, $headers));
    }

    public function deleteJson($uri, array $data = [], array $headers = [])
    {
        return parent::deleteJson($uri, $data, array_merge($this->headers, $headers));
    }
}

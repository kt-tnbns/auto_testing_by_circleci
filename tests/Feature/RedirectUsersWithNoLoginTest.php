<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectUsersWithNoLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_unauthenticated_user_redirect()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect(route('login'));
    }
}

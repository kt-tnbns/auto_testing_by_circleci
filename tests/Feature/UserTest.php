<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\UsersTableSeeder;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    //Check if login page exists
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    //Check if user exists in database
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'flash',
            'email' => 'flash@gmail.com'
        ]);

        $user2 = User::make([
            'name' => 'tang',
            'email' => 'tang@gmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    //Test if a user can be deleted (make sure that you add the middleware)
    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }
    public function test_if_it_stores_new_users()
    {
        $response = $this->post('/register', [
            'name' => 'por',
            'email' => 'por@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        $response->assertRedirect('/dashboard');
    }
    public function test_if_data_exists_in_database()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'por'
        ]);
    }

    public function test_if_data_does_not_exists_in_database()
    {
        $this->assertDatabaseMissing('users', [
            'name' => 'tang'
        ]);
        $this->assertDatabaseMissing('users', [
            'name' => 'por'
        ]);
    }
}

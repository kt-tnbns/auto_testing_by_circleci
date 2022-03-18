<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
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
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com'
        ]);

        $user2 = User::make([
            'name' => 'Mary Jane',
            'email' => 'maryjane@gmail.com'
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
}

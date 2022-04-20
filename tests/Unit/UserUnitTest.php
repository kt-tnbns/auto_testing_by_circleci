<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\UsersTableSeeder;
use App\Providers\RouteServiceProvider;

class UserUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
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

    public function test_if_it_stores_new_users()
    {
        $response = $this->post('/register', [
            'name' => 'por',
            'email' => 'por@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_if_data_exists_in_database()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'por'
        ]);
    }

    public function testUpdateUser()
    {
		//just creating a new user in case of no user 

        $data['name'] = 'tang';

        $user = User::first();
        $user->update($data);

        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals($data['name'], $user->name);

        $this->assertTrue(true);
    }
    public function test_if_data_exists_in_database2()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'tang'
        ]);
    }
    public function testUpdateUser2()
    {
		//just creating a new user in case of no user 

        $data['name'] = 'por';

        $user = User::first();
        $user->update($data);

        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals($data['name'], $user->name);

        $this->assertTrue(true);
    }



    }
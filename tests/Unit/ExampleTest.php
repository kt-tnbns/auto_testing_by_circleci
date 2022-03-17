<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    public function testUserCreation()
    {
    $user = new User([
        'name' => "flash",
        'email' => "test@test.com",
        'password' => bcrypt("12345678")
    ]);   

    $this->assertEquals('Test User', $user->name);
    }

}

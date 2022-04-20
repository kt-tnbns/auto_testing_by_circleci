<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TaskUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_id_detect_null()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}

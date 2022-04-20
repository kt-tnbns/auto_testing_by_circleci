<?php

namespace Tests\BAT;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class DeleteTaskBAT extends TestCase {
    public function test_delete_undefined_task(){
        $this->delete('/tasks/100');
        $this->assertGuest();
    }
}
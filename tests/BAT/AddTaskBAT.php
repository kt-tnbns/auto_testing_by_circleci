<?php

namespace Tests\BAT;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class AddTaskBAT extends TestCase{
    public function test_wrong_deadline(){
        $task = new Task([
            'user_id' => '1',
            'description' => 'learn',
            'date' => '10/10/2022',
            'deadline' => '11/9/2022'
        ]);
        $this->assertEquals('11/9/2022', $task->deadline);
    }

    public function test_id_detect_null(){
        $task = new Task([
            'user_id' => 1,
            'description' => null,
        ]);
        $this->assertEquals(null, $task->description);
    }

}
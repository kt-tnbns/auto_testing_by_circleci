<?php
    
namespace Tests\BAT;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class EditTaskBAT extends TestCase 
{
    public function test_edit_task_to_null() {
        $task = new Task([
            'user_id' => 1,
            'description' => 'Test add test to todolist',
            'date' => '10/10/2022',
            'deadline' => '11/10/2022'
        ]);

        $task->description = null;

        $this -> assertEquals(null, $task -> description);
    }

}
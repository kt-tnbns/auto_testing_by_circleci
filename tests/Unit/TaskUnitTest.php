<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\TasksTableSeeder;


class TaskUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_if_it_stores_new_task()
    {
        $task = new Task([
            'task_name' => 'por',
            'task_details' => 'por@gmail.com',
            'user_id' => '1',
        ]);

        $this->assertEquals('1',$task->user_id);
    }

    public function test_if_it_stores_edit_task()
    {
        $task = new Task([
            'task_name' => 'tang',
            'task_details' => 'por@gmail.com',
            'user_id' => '1',
        ]);

        $this->assertEquals('tang',$task->task_name);
    }
    public function test_if_it_stores_deleted_task() {
        $task = new Task([
            'user_id' => 1,
            'task_name' => 'tang',
        ]);

        $this->delete('/tasks/'.$task->id);
        $this->assertDatabaseMissing('tasks',['id'=> $task->id]);
    }
}

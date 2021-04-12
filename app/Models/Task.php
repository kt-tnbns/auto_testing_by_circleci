<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name', 
        'task_details',
        'user_id'
    ];

    public function checkOffTask(){
        $this->task_status = $this->task_status ? false : true;
        $this->save();
    }
}

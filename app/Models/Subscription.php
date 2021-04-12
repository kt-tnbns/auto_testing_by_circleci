<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SubscriptionController;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'email'
    ];
}

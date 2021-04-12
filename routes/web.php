<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

use App\Http\Controllers\SubscriptionController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\UsersController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/', [SubscriptionController::class, 'store'])->name('welcome');

Route::get('/admin/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

Route::post('/tasks/complete', [TaskController::class, 'markTaskAsCompleted'])->name('mark');

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');

Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');

Route::get('/user/password/edit', [UserController::class, 'passwordEdit'])->name('user.passwordEdit');

Route::post('/user/password/edit', [UserController::class, 'passwordUpdate'])->name('user.passwordUpdate');

Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users', UsersController::class)->except([
        'create', 'show', 'store'
    ]);
});






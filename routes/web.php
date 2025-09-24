<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::middleware('auth')->group(function () {

    Route::controller(TaskController::class)->group(function (){
        Route::get('/all/task','AllTask')->name('all.task');
        Route::get('/add/task','AddTask')->name('add.task');
        Route::post('/store/task','StoreTask')->name('store.task');
        Route::get('/view/task/{id}','ViewTask')->name('view.task');
        Route::get('/edit/task/{id}','EditTask')->name('edit.task');
        Route::post('/update/task','UpdateTask')->name('update.task');
        Route::get('/delete/task/{id}','DeleteTask')->name('delete.task');

        Route::get('/task/complete/{id}','CompleteTask')->name('task.complete');
        Route::get('/task/pending/{id}','PendingTask')->name('task.pending');
    });
    
});
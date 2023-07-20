<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });//タスク一覧ページを写す

Route::group(['middleware' => 'auth'], function() {
    // Route::get('/', 'HomeController@index')->name('home');//web通りチャプター８
    Route::get('/', [HomeController::class, 'index'])->name('home');//web通りチャプター８


    
    // Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');//web通りチャプター５
    Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');//web通りチャプター５
    
    // Route::post('/folders/create', 'FolderController@create');//web通りチャプター５
    Route::post('/folders/create', [FolderController::class, 'create'])->name('folders.create');//web通りチャプター５
    
    Route::group(['middleware' => 'can:view,folder'], function() {
        Route::get('/folders/{folder}/tasks', [TaskController::class, 'index'])->name('tasks.index');//web通りチャプター３

        // Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');//web通りチャプター6
        Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');//web通りチャプター6

        // Route::post('/folders/{id}/tasks/create', 'TaskController@create');//web通りチャプター6
        Route::post('/folders/{folder}/tasks/create', [TaskController::class, 'create']);//web通りチャプター6

        // Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');//web通りチャプター7
        Route::get('/folders/{folder}/tasks/{task}/edit',  [TaskController::class, 'showEditForm'])->name('tasks.edit');//web通りチャプター7

        // Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');//web通りチャプター7
        Route::post('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'edit']);//web通りチャプター7
    });
});

Auth::routes();

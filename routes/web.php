<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
//     return view('tasks');
// });//タスク一覧ページを写す

Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');//web通り

// Route::get('/folders/{id}/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');//web通り



Route::get('/folder', [App\Http\Controllers\Controller::class, 'folder'])->name('folder');//フォルダ作成ページ遷移

Route::get('/task', [App\Http\Controllers\Controller::class, 'task'])->name('task');//タスク作成ページ遷移

Route::get('/edit-task', [App\Http\Controllers\Controller::class, 'edit_task'])->name('edit-task');//タスク編集ページ遷移

Route::post('/folder_create', [App\Http\Controllers\Controller::class, 'folder_create'])->name('folder_create');//フォルダ作成機能


Route::post('/task_create', [App\Http\Controllers\Controller::class, 'task_create'])->name('task_create');//タスク作成機能







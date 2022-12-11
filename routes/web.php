<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/tasks/create', [TaskController::class, 'create']);

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);

Route::get('/tasks/{task}', [TaskController::class, 'show']);

Route::post('/tasks', [TaskController::class, 'store']);

Route::put('/tasks/{task}', [TaskController::class, 'update']);

Route::delete('/tasks/{task}', [TaskController::class, 'delete']);

Route::post('/tasks/check',[TaskController::class, 'check']);

Route::get('/payments', [PaymentController::class, 'index']);

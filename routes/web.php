<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

use App\Http\Controllers\PaymentController;

use App\Http\Controllers\MemoryController;

use App\Http\Controllers\BudgetController;

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

Route::get('/payments', [PaymentController::class, 'index']);

Route::get('/payments/create', [PaymentController::class, 'create']);

Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit']);

Route::get('/payments/{payment}', [PaymentController::class, 'show']);

Route::post('/payments', [PaymentController::class, 'store']);

Route::put('/payments/{payment}', [PaymentController::class, 'update']);

Route::delete('/payments/{payment}', [PaymentController::class, 'delete']);

Route::get('/memories', [MemoryController::class, 'index']);

Route::get('/memories/create', [MemoryController::class, 'create']);

Route::get('/memories/{memory}/edit', [MemoryController::class, 'edit']);

Route::get('/memories/{memory}', [MemoryController::class, 'show']);

Route::post('/memories', [MemoryController::class, 'store']);

Route::put('/memories/{memory}', [MemoryController::class, 'update']);

Route::delete('/memories/{memory}', [MemoryController::class, 'delete']);

Route::get('/budgets', [BudgetController::class, 'index']);

Route::get('/budgets/create', [BudgetController::class, 'create']);

Route::get('/budgets/{budget}/edit', [BudgetController::class, 'edit']);

Route::get('/budgets/{budget}', [BudgetController::class, 'show']);

Route::post('/budgets', [BudgetController::class, 'store']);

Route::put('/budgets/{budget}', [BudgetController::class, 'update']);

Route::delete('/budgets/{budget}', [BudgetController::class, 'delete']);

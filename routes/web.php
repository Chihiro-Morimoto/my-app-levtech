<?php

use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(TaskController::class)->middleware(['auth'])->group(function(){
    Route::get('/tasks', 'index')->name('tasks.index');
    Route::get('/tasks/create', 'create')->name('tasks.create');
    Route::get('/tasks/{task}/edit', 'edit')->name('tasks.edit');
    Route::get('/tasks/{task}', 'show')->name('tasks.show');
    Route::post('/tasks', 'store')->name('tasks.store');
    Route::put('/tasks/{task}', 'update')->name('tasks.update');
    Route::delete('/tasks/{task}', 'delete')->name('tasks.delete');
});

Route::controller(PaymentController::class)->middleware(['auth'])->group(function(){
    Route::get('/payments', 'index')->name('payments.index');
    Route::get('/payments/create', 'create')->name('payments.create');
    Route::get('/payments/{payment}/edit', 'edit')->name('payments.edit');
    Route::get('/payments/{payment}', 'show')->name('payments.show');
    Route::post('/payments', 'store')->name('payments.store');
    Route::put('/payments/{payment}', 'update')->name('payments.update');
    Route::delete('/payments/{payment}', 'delete')->name('payments.delete');
});


Route::controller(MemoryController::class)->middleware(['auth'])->group(function(){
    Route::get('/memories', 'index')->name('memories.index');
    Route::get('/memories/create', 'create')->name('memories.create');
    Route::get('/memories/{memory}/edit', 'edit')->name('memories.edit');
    Route::get('/memories/{memory}', 'show')->name('memories.show');
    Route::post('/memories', 'store')->name('memories.store');
    Route::put('/memories/{memory}', 'update')->name('memories.update');
    Route::delete('/memories/{memory}', 'delete')->name('memories.delete');
});

Route::controller(BudgetController::class)->middleware(['auth'])->group(function(){
    Route::get('/budgets', 'index')->name('budgets.index');
    Route::get('/budgets/create', 'create')->name('budgets.create');
    Route::get('/budgets/{budget}/edit', 'edit')->name('budgets.edit');
    Route::get('/budgets/{budget}', 'show')->name('budgets.show');
    Route::post('/budgets', 'store')->name('budgets.store');
    Route::put('/budgets/{budget}', 'update')->name('budgets.update');
    Route::delete('/budgets/{budget}', 'delete')->name('budgets.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

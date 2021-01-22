<?php

use App\Http\Controllers\RecalculationController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [RecalculationController::class, 'index'])->name('index.history');

Route::get('/income', [TransactionsController::class, 'index'])->name('income.index');
Route::post('/income', [TransactionsController::class, 'income'])->name('income.store');

Route::get('/outgo', [TransactionsController::class, 'show'])->name('outgo.index');
Route::post('/outgo', [TransactionsController::class, 'outgo'])->name('outgo.store');

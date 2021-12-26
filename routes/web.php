<?php

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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/topup', 'TransactionController@topupIndex')->name('topup-index');
    Route::post('/topup', 'TransactionController@topupStore')->name('topup-store');

    Route::get('/withdraw', 'TransactionController@withdrawIndex')->name('withdraw-index');
    Route::post('/withdraw', 'TransactionController@withdrawStore')->name('withdraw-store');

    Route::get('/transfer', 'TransactionController@transferIndex')->name('transfer-index');
    Route::post('/transfer', 'TransactionController@transferStore')->name('transfer-store');
});


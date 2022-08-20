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


Route::middleware('auth')->group(function () {
    Route::get('/', \App\Http\Controllers\IndexController::class)->name('index');
    Route::get('/record/add', [\App\Http\Controllers\RecordController::class, 'add'])->name('record.add');
    Route::post('/record/store', [\App\Http\Controllers\RecordController::class, 'store'])->name('record.store');
    Route::delete('/record/delete/{record}', [\App\Http\Controllers\RecordController::class, 'delete'])->name('record.delete')->can('delete', 'record');
    Route::get('/records/{people}', [\App\Http\Controllers\RecordController::class, 'view'])->name('record.people');
    Route::post('/record/form-view', [\App\Http\Controllers\RecordController::class, 'getFormView']);

    Route::get('/clients', [\App\Http\Controllers\ClientController::class, 'index'])->name('clients');
});

require __DIR__ . '/auth.php';

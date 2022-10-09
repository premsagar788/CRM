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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::controller(App\Http\Controllers\ClientsController::class)->group(function () {
    Route::get('/admin/clients', 'index');
    Route::get('/admin/clients/add', 'addClient');
    Route::post('/admin/clients/add', 'addClientSave');
});

Route::controller(App\Http\Controllers\LeadsController::class)->group(function () {
    Route::get('/admin/leads', 'index');
    Route::get('/admin/leads/add', 'addLead');
    Route::post('/admin/leads/add', 'addLeadSave');
});

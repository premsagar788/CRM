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

Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::controller(App\Http\Controllers\ClientsController::class)->middleware('auth')->group(function () {
    Route::get('/admin/clients', 'index');
    Route::get('/admin/clients/add', 'addClient');
    Route::post('/admin/clients/add', 'addClientSave');
    Route::get('/admin/clients/edit/{id}', 'editClientView');
    Route::post('/admin/clients/update/{id}', 'editClientSave');
    Route::get('/admin/clients/delete/{id}', 'deleteClient');
});

Route::controller(App\Http\Controllers\LeadsController::class)->middleware('auth')->group(function () {
    Route::get('/admin/leads', 'index');
    Route::get('/admin/leads/add', 'addLead');
    Route::post('/admin/leads/add', 'addLeadSave');
    Route::get('/admin/leads/edit/{id}', 'editLeadView');
    Route::post('/admin/leads/update/{id}', 'editLeadSave');
    Route::get('/admin/leads/delete/{id}', 'deleteLead');
});

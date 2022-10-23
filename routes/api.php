<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(App\Http\Controllers\AuthAPIController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::controller(App\Http\Controllers\ClientsAPIController::class)->prefix('/clients')->group(function () {
        Route::get('/', 'index');
        Route::post('/add', 'addClientSave');
        Route::post('/update/{id}', 'editClientSave');
        Route::get('/delete/{id}', 'deleteClient');
    });

    Route::controller(App\Http\Controllers\LeadsController::class)->prefix('/leads')->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'addLead');
        Route::post('/add', 'addLeadSave');
        Route::get('/edit/{id}', 'editLeadView');
        Route::post('/update/{id}', 'editLeadSave');
        Route::get('/delete/{id}', 'deleteLead');
    });
    
    Route::controller(App\Http\Controllers\ProjectsController::class)->prefix('/projects')->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'addProject');
        Route::post('/add', 'addProjectSave');
        Route::get('/edit/{id}', 'editProjectView');
        Route::post('/update/{id}', 'editProjectSave');
        Route::get('/delete/{id}', 'deleteProject');
    });
});
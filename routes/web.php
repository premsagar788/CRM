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

Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/faq', function () {
    return view('faq');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::controller(App\Http\Controllers\ClientsController::class)->prefix('/clients')->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'addClient');
        Route::post('/add', 'addClientSave');
        Route::get('/edit/{id}', 'editClientView');
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


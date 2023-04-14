<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ManagerServiceItemController;
use App\Http\Controllers\ManagerUserController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
->name('home.index');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');

Route::get('/services', [ServiceController::class, 'index'])
->name('services.index');

Route::post('/services', [ServiceController::class, 'store'])
->name('services.store');

Route::get('/services/create', [ServiceController::class, 'create'])
->name('services.create');

Route::get('/services/edit', [ServiceController::class, 'edit'])
->name('services.edit');

Route::get('/services/{id}', [ServiceController::class, 'show'])
->name('services.show');

Route::put('/services/{id}', [ServiceController::class, 'update'])
->name('services.update');

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])
->name('services.destroy');

Route::post('trackings', [TrackingController::class, 'store'])
->name('trackings.store');

Route::get('trackings/create', [TrackingController::class, 'create'])
->name('trackings.create');

Route::get('trackings/{tracking_code}', [TrackingController::class, 'show'])
->name('trackings.show');


Route::prefix('users')->name('users.')->group(function() {
    Route::get('/', [UserController::class, 'index'])
    ->name('index');
    Route::get('/edit', [UserController::class, 'edit'])
    ->name('edit');
    Route::put('/', [UserController::class, 'update'])
    ->name('update');
    Route::delete('/', [UserController::class, 'destroy'])
    ->name('delete');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [ManagerServiceItemController::class, 'index'])
    ->name('index');
    Route::get('/create', [ManagerServiceItemController::class, 'create'])
    ->name('create');
    Route::post('/', [ManagerServiceItemController::class, 'store'])
    ->name('store');
    Route::get('/{serviceItem}/edit', [ManagerServiceItemController::class, 'edit'])
    ->name('edit');
    Route::put('/{serviceItem}', [ManagerServiceItemController::class, 'update'])
    ->name('update');
    Route::delete('/{serviceItem}', [ManagerServiceItemController::class, 'destroy'])
    ->name('delete');
});

Route::prefix('managerservice')->name('managerservice.')->group(function() {
    Route::get('/', [ManagerServiceController::class, 'index'])
    ->name('index');
});

Route::prefix('manageruser')->name('manageruser.')->group(function() {
    Route::get('/', [ManagerUserController::class, 'index'])
    ->name('index');
    Route::get('/{user}', [ManagerUserController::class, 'show'])
    ->name('show');
});
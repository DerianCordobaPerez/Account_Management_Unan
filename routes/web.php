<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    // Home routes
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');

    // User routes
    Route::resources([
        'users' => UserController::class,
        'payments' => PaymentController::class,
        'roles' => RoleController::class,
        'concepts' => ConceptController::class,
        'currencies' => CurrencyController::class,
    ]);

    // Show payments by user
    Route::get('/users/{user}/payments', [UserController::class, 'payments'])->name('users.payments');

    // Assign role to user
    Route::get('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.assign.role');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRoleStore'])->name('users.store.role');
});

<?php

use App\Http\Controllers\ConceptController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Home routes
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');

    // User routes
    Route::resources([
        'users' => UserController::class,
        'payments' => PaymentController::class,
        'concepts' => ConceptController::class,
        'currencies' => CurrencyController::class,
    ]);

    // Role routes except show
    Route::resource('roles', RoleController::class)->except(['show']);

    // Show payments by user
    Route::get('/users/{user}/payments', [UserController::class, 'payments'])->name('users.payments');

    // Assign role to user
    Route::get('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.assign.role');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRoleStore'])->name('users.store.role');

    // Disable user
    Route::post('/users/{user}/disable', [UserController::class, 'disable'])->name('users.disable');

    // Enable user
    Route::post('/users/{user}/enable', [UserController::class, 'enable'])->name('users.enable');

    // Show trashed roles
    Route::get('/roles/trashed', [RoleController::class, 'trashed'])->name('roles.trashed');
    Route::put('/roles/{role}/restore', [RoleController::class, 'restore'])->name('roles.restore');

    // Delete permanently roles
    Route::delete('/roles/{role}/force', [RoleController::class, 'force'])->name('roles.force');
});

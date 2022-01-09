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

    // User routes
    Route::resources([
        'users' => UserController::class,
        'payments' => PaymentController::class,
        'currencies' => CurrencyController::class,
    ]);

    // Role routes
    Route::resource('roles', RoleController::class)->except(['show']);

    // Concept routes
    Route::resource('concepts', ConceptController::class)->except(['show']);

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

    // Show trashed concepts
    Route::get('/concepts/trashed', [ConceptController::class, 'trashed'])->name('concepts.trashed');
    Route::put('/concepts/{concept}/restore', [ConceptController::class, 'restore'])->name('concepts.restore');

    // Delete permanently concepts
    Route::delete('/concepts/{concept}/force', [ConceptController::class, 'force'])->name('concepts.force');
});

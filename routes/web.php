<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::get('/login', [HomeController::class, 'index'])
    ->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('user.logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('menus')->name('menus.')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::get('/create', [MenuController::class, 'create'])->name('create');
        Route::post('/store', [MenuController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('edit');
        Route::put('/{id}', [MenuController::class, 'update'])->name('update');
        Route::delete('/{id}', [MenuController::class, 'destroy'])->name('destroy');
        
        // Menu order management
        Route::get('/move/{id}/{direction}', [MenuController::class, 'move'])->name('move');
        
        // Menu parent selection (AJAX)
        Route::post('/parents', [MenuController::class, 'getParents'])->name('parents');
        
        // Tree view
        Route::get('/tree', [MenuController::class, 'tree'])->name('tree');
        
        // Menu roles/access management
        Route::get('/roles', [MenuController::class, 'roles'])->name('roles');
        Route::get('/get-group-access/{group_id}', [MenuController::class, 'getGroupAccess'])->name('get-group-access');
        Route::post('/save-group-access', [MenuController::class, 'saveGroupAccess'])->name('save-group-access');
        Route::post('/toggle-access', [MenuController::class, 'toggleAccess'])->name('toggle-access');
        Route::post('/bulk-assign-access', [MenuController::class, 'bulkAssignAccess'])->name('bulk-assign-access');
        Route::get('/export-roles', [MenuController::class, 'exportRoles'])->name('export-roles');
    });
});

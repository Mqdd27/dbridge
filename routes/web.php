<?php

use App\Http\Controllers\sessioncontroller;
use App\Http\Controllers\wrcontroller;
use App\Http\Controllers\stockcodecontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [sessioncontroller::class, 'index']);
    Route::post('/', [sessioncontroller::class, 'login']);
});


Route::prefix('dashboard')->group(function () {
    Route::get('admin', [wrcontroller::class, 'index'])->name('admindashboard');
    Route::get('supplier', [wrcontroller::class, 'index'])->name('supplierdashboard');
    Route::get('user', [wrcontroller::class, 'index'])->name('userdashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('wr', wrcontroller::class);
    Route::get('wr-export', [wrcontroller::class, 'export'])->name('wr.export');

    // Dashboard
    Route::get('/dashboard', function () {
        // $role = Auth::check() && Auth::user()->role == 'sm';
        $role = Auth::check() ? Auth::user()->role : null;
        if ($role === 'sm') {
            return redirect()->route('admindashboard');
        } elseif ($role === 'supplier') {
            return redirect()->route('supplierdashboard');
        } else {
            return redirect()->route('userdashboard');
        }
    })->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        Route::get('admin', [wrcontroller::class, 'index'])->name('admindashboard');
        Route::get('supplier', [wrcontroller::class, 'index'])->name('supplierdashboard');
        Route::get('user', [wrcontroller::class, 'index'])->name('userdashboard');
    });

    // Users Management (Admin Only)
    // Route::middleware([AdminMiddleware::class . ':sm'])->group(function () {
    //     Route::resource('users', UserController::class);
    //     Route::get('userlist', [UserController::class, 'index'])->name('users.list');
    // });

    // Stock Code
    Route::get('/get-stock/{stock_code}', [stockcodecontroller::class, 'getStockData'])->name('stock.get');
    // Route::get('/get-stock/{stock_code}', [StockCodeController::class, 'getStockData'])->name('stock.get');

    // Role & Permission Management
    // Route::prefix('role')->middleware(['admin'])->name('roles.')->group(function () {
    //     Route::get('/permissions', [RolePermissionController::class, 'index'])->name('permissions.index');
    //     Route::post('/permissions', [RolePermissionController::class, 'store'])->name('permissions.store');
    // });

    // Logout
    Route::post('/logout', [sessioncontroller::class, 'logout'])->name('logout');
});

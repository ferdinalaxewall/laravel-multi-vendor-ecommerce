<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Profile Route
        Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile'); 
        Route::post('profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update'); 
        Route::post('change-password', [AdminController::class, 'changePassword'])->name('admin.change-password'); 

        // Dashboard Route
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Auth Route
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});

Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
});

require __DIR__.'/auth.php';

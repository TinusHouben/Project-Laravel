<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // jouw custom view
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/teams', function () {
    return view('teams');
})->middleware(['auth'])->name('teams');

Route::get('/faq', function () {
    return view('faq');
})->middleware(['auth'])->name('faq');

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes, alleen toegankelijk voor admin users
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard'); // admin dashboard view
    })->name('admin.dashboard');

    // Voeg hier je admin routes toe, bv:
    // Route::post('/admin/users/promote', [UserController::class, 'promote'])->name('admin.users.promote');
});

require __DIR__.'/auth.php';

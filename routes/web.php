<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController; // Voeg de UserController toe
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // Jouw custom view
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

// Publieke profielpagina, toegankelijk voor iedereen (ook niet-ingelogde gebruikers)
Route::get('/user/{user}', [ProfileController::class, 'showPublic'])->name('profile.showPublic');

Route::middleware('auth')->group(function () {
    // Profielpagina (bekijken)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');  // Toon het profiel

    // Profiel bewerken (update)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');  // Toon bewerkformulier
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  // Update profielgegevens
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  // Verwijder profiel (optioneel)

    // Profielfoto uploaden
    Route::post('/profile/photo', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');
});

// Admin routes, alleen toegankelijk voor admin users
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
        Route::patch('/password', [PasswordController::class, 'update'])->name('password.update');
    });

    // Gebruikersbeheer routes
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/users/{user}/promote', [UserController::class, 'promote'])->name('admin.users.promote');
    Route::post('/admin/users/{user}/demote', [UserController::class, 'demote'])->name('admin.users.demote');
});

require __DIR__.'/auth.php';

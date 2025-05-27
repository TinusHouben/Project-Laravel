<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsItemController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordController;  // Vergeet deze import niet!
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

// Basisroute
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route, vereist authenticatie en verificatie
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Teams route, vereist authenticatie
Route::get('/teams', function () {
    return view('teams');
})->middleware(['auth'])->name('teams');

// Publieke FAQ-pagina (voor iedereen toegankelijk)
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Contactpagina tonen (voor iedereen toegankelijk) - via controller
Route::get('/contactform', [ContactController::class, 'show'])->name('contactform.show');

// Contactformulier versturen (voor iedereen toegankelijk)
Route::post('/contactform', [ContactController::class, 'send'])->name('contactform.send');

// Publieke profielpagina, toegankelijk voor iedereen
Route::get('/user/{user}', [ProfileController::class, 'showPublic'])->name('profile.showPublic');

// Gebruikersroutes voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');
    
    // Voeg hier de route voor wachtwoord wijzigen toe
    Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
    Route::patch('/password', [PasswordController::class, 'update'])->name('password.update');
});

// Admin routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Admin dashboard
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Gebruikersbeheer
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/users/{user}/promote', [UserController::class, 'promote'])->name('admin.users.promote');
    Route::post('/admin/users/{user}/demote', [UserController::class, 'demote'])->name('admin.users.demote');

    // Nieuwsbeheer
    Route::get('/admin/news/create', [NewsItemController::class, 'create'])->name('news.create');
    Route::post('/admin/news', [NewsItemController::class, 'store'])->name('news.store');

    // Route aanpassen van PATCH naar GET voor het bewerken van nieuwsitems
    Route::get('/admin/news/{newsItem}/edit', [NewsItemController::class, 'edit'])->name('news.edit'); // GET voor bewerken
    Route::patch('/admin/news/{newsItem}', [NewsItemController::class, 'update'])->name('news.update');
    Route::delete('/admin/news/{newsItem}', [NewsItemController::class, 'destroy'])->name('news.destroy');

    // FAQ beheer (categorieën en items)
    Route::get('/admin/faq/categories/create', [FaqController::class, 'createCategory'])->name('faq.categories.create');
    Route::post('/admin/faq/categories', [FaqController::class, 'storeCategory'])->name('faq.categories.store');

    Route::get('/admin/faq/items/create', [FaqController::class, 'createItem'])->name('faq.items.create');
    Route::post('/admin/faq/items', [FaqController::class, 'storeItem'])->name('faq.items.store');

    // Testformulier route (staat nu in admin groep, wil je dat?)
    Route::get('/testform', function () {
        return view('testform');
    })->name('testform');
});

// Publieke route om alle profielen te zien
Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');



// Nieuwsroutes voor gewone gebruikers (publiekelijk toegankelijk, geen auth middleware)
Route::get('/news', [NewsItemController::class, 'index'])->name('news.index');
Route::get('/news/{newsItem}', [NewsItemController::class, 'show'])->name('news.show');

// Authenticatie routes
require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CantonController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [ClientController::class, 'create'])->name('services');
Route::post('/services', [ClientController::class, 'store'])->name('services.store');
Route::get('/services-details', [PageController::class, 'servicesDetails'])->name('services-details');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

// Language switcher
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'de', 'sq', 'fr'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

// API: Canton prices
Route::get('/api/cantons/prices', [CantonController::class, 'getPrices'])->name('api.cantons.prices');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Staff Routes (Can view clients OR messages)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'can.view.clients'])->group(function () {
    Route::get('/admin/clients', [ClientController::class, 'adminIndex'])->name('admin.clients');
    Route::get('/admin/clients/{client}/pdf', [ClientController::class, 'viewPdf'])->name('admin.clients.pdf');
    Route::get('/admin/clients/{client}/pdf/download', [ClientController::class, 'downloadPdf'])->name('admin.clients.pdf.download');
});

Route::middleware(['auth', 'can.view.messages'])->group(function () {
    Route::get('/admin/messages', [ContactMessageController::class, 'adminIndex'])->name('admin.messages');
    Route::delete('/admin/messages/{message}', [ContactMessageController::class, 'destroy'])->name('admin.messages.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin-Only Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::patch('/admin/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('admin.users.toggle-admin');
    Route::patch('/admin/users/{user}/permissions', [UserController::class, 'updatePermissions'])->name('admin.users.permissions');

    Route::get('/admin/cantons', [CantonController::class, 'index'])->name('admin.cantons');
    Route::patch('/admin/cantons/{canton}', [CantonController::class, 'update'])->name('admin.cantons.update');
});

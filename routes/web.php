<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;

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

// HOME
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Login / Register
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'addUser'])->name('addUser');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Organisasi
Route::middleware('auth')->group(
    function () {
        Route::get('/organisasi', [OrganizationController::class, 'index'])->name('organisasi.index');
        Route::get('/organisasi/{organization}', [OrganizationController::class, 'show'])->name('organisasi.show');
        Route::get('/organisasi-create', [OrganizationController::class, 'create'])->name('organisasi.create');
        Route::post('/organisasi-create', [OrganizationController::class, 'store'])->name('organisasi.store');
        // Departement
        Route::get('/struktur', [DepartementController::class, 'index'])->name('departement.index');
        Route::get('/struktur/create', [DepartementController::class, 'create'])->name('departement.create');
        Route::post('/struktur/create', [DepartementController::class, 'store'])->name('departement.store');
    }
);

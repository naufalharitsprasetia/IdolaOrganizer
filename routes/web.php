<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkProgramController;
use App\Models\Position;
use App\Models\WorkProgram;

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
Route::get('/learning', [HomeController::class, 'learning'])->name('learning');
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
Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

// ADMIN
Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.index')->middleware(['auth', 'admin']);

// JUST AUTH MIDDLEWARE
Route::middleware('auth')->group(
    function () {
        Route::get('/organisasi', [OrganizationController::class, 'index'])->name('organisasi.index');
        Route::get('/organisasi-create', [OrganizationController::class, 'create'])->name('organisasi.create');
        Route::post('/organisasi-create', [OrganizationController::class, 'store'])->name('organisasi.store');
    }
);
// AUTH MIDDLEWARE + CHECK ORGANIZATION ACCESS , parameter nya {{ organization }}, tambahin /{organization} disetiap route
Route::middleware(['auth', 'check.organization.access'])->group(
    function () {
        Route::get('/organisasi/{organization}', [OrganizationController::class, 'show'])->name('organisasi.show');
        // Departement
        Route::get('/struktur', [DepartementController::class, 'index'])->name('departement.index');
        Route::get('/struktur/create', [DepartementController::class, 'create'])->name('departement.create');
        Route::post('/struktur/create', [DepartementController::class, 'store'])->name('departement.store');
        Route::get('/struktur/{departement}', [DepartementController::class, 'show'])->name('departement.show');
        // Positions
        Route::get('/posisi/create', [PositionController::class, 'create'])->name('position.create');
        Route::post('/posisi/create', [PositionController::class, 'store'])->name('position.store');
        // Member
        Route::get('/member', [MemberController::class, 'index'])->name('member.index');
        Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
        Route::post('/member/create', [MemberController::class, 'store'])->name('member.store');
        Route::get('/member/{member}', [MemberController::class, 'show'])->name('member.show');
        // Program Kerja
        Route::get('/proker', [WorkProgramController::class, 'index'])->name('proker.index');
        Route::get('/proker/create', [WorkProgramController::class, 'create'])->name('proker.create');
        Route::post('/proker/create', [WorkProgramController::class, 'store'])->name('proker.store');
        // Task
        // Route::get('/task', [TaskController::class, 'index'])->name('task.index');
        Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
        Route::post('/task/create', [TaskController::class, 'store'])->name('task.store');
        // Event
        Route::get('/event', [EventController::class, 'index'])->name('event.index');
        Route::get('/event/list', [EventController::class, 'getEvents'])->name('event.list');
        Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
        // Keuangan (ROLE = bendahara)
        Route::get('/keuangan', [FinancialController::class, 'index'])->name('keuangan.index');
        Route::get('/keuangan/create', [FinancialController::class, 'create'])->name('keuangan.create');
        Route::post('/keuangan/create', [FinancialController::class, 'store'])->name('keuangan.store');
    }
);

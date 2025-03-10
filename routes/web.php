<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobOfferController;

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/students/dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');
    Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job-offers.index');
    Route::get('/job-offers/{id}', [JobOfferController::class, 'show'])->name('job-offers.show');
});

Route::middleware(['auth', 'role:company'])->group(function () {
    Route::get('/companies/dashboard', [CompanyController::class, 'dashboard'])->name('companies.dashboard');
    Route::get('/job-offers/create', [JobOfferController::class, 'create'])->name('job-offers.create');
    Route::post('/job-offers', [JobOfferController::class, 'store'])->name('job-offers.store');
    Route::get('/job-offers/{id}/edit', [JobOfferController::class, 'edit'])->name('job-offers.edit');
    Route::put('/job-offers/{id}', [JobOfferController::class, 'update'])->name('job-offers.update');
    Route::delete('/job-offers/{id}', [JobOfferController::class, 'destroy'])->name('job-offers.destroy');
});
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

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/students/dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');
});

Route::middleware(['auth', 'role:company'])->group(function () {
    Route::get('/companies/dashboard', [CompanyController::class, 'dashboard'])->name('companies.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

require __DIR__ . '/auth.php';

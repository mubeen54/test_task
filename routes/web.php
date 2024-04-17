<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::view('/company', 'company.create')->middleware(['auth', 'verified'])->name('company');
Route::post('/company', [CompanyController::class, 'store'])->middleware(['auth', 'verified'])->name('companies.store');
Route::get('/companies', [CompanyController::class, 'index'])->middleware(['auth', 'verified'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->middleware(['auth', 'verified'])->name('companies.show');
Route::put('/companies/{company}', [CompanyController::class, 'update'])->middleware(['auth', 'verified'])->name('companies.update');
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->middleware(['auth', 'verified'])->name('companies.edit');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->middleware(['auth', 'verified'])->name('companies.destroy');

Route::view('/employee', 'employee.create')->middleware(['auth', 'verified'])->name('employee.create');
Route::get('/employee', [CompanyController::class, 'showCompanies'])->middleware(['auth', 'verified'])->name('employee.create');
Route::post('/employee-store', [EmployeeController::class, 'store'])->middleware(['auth', 'verified'])->name('employees.store');
Route::get('/employees', [EmployeeController::class, 'index'])->middleware(['auth', 'verified'])->name('employees.index');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->middleware(['auth', 'verified'])->name('employees.show');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->middleware(['auth', 'verified'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->middleware(['auth', 'verified'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->middleware(['auth', 'verified'])->name('employees.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

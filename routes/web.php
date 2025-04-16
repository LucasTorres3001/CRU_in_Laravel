<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

Route::get('/', function () {
    return view('welcome');
});
*/

/* ------------------------------------------------------------ ** EMPLOYEES ** ------------------------------------------------------------ */
Route::get('/', [EmployeeController::class, 'index'])->name('home');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create')->middleware('auth');
Route::post('/employees/create', [EmployeeController::class,'store'])->name('employees.store');
Route::get('/employees/dashboard', [EmployeeController::class, 'dashboard'])->name('employees.dashboard');
Route::get('/employees/edit/{slug}', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::get('/employees/{slug}', [EmployeeController::class, 'show'])->name('employees.show');
Route::put('employees/{slug}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{slug}', [EmployeeController::class, 'destroy'])->name('employees.delete');

/* ---------------------------------------------------------- ** PROFESSIONS ** ---------------------------------------------------------- */
Route::get('/professions/create', [ProfessionController::class, 'create'])->name('professions.create');
Route::post('/professions/create', [ProfessionController::class, 'store'])->name('professions.store');

/* ------------------------------------------------------------ ** LOCATIONS ** ------------------------------------------------------------ */
Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
Route::post('/locations/create', [LocationController::class, 'store'])->name('locations.store');

/* ----------------------------------------------------------- ** COURSES ** ----------------------------------------------------------- */
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses/create', [CourseController::class, 'store'])->name('courses.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/addStudent');
Route::get('/student-list', [StudentsController::class, 'index'])->name('student-list');
Route::get('/addStudent', [StudentsController::class, 'create'])->name('addStudent');
Route::get('/student-edit/{id}', [StudentsController::class, 'edit'])->name('student-edit');
Route::post('/student-update/{id}', [StudentsController::class, 'update'])->name('student-update');
Route::get('/student-delete/{id}', [StudentsController::class, 'destroy'])->name('student-delete');
Route::get('/student-profile/{id}', [StudentsController::class, 'show'])->name('student-profile');
Route::post('/students-store', [StudentsController::class, 'store'])->name('students-store');
Route::get('/students-store', [StudentsController::class, 'store'])->name('students-store');
Route::get('/export-students', [StudentsController::class, 'export'])->name('export-students');

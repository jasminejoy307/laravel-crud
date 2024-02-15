<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\{AuthController, StudentController, RoomController};

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
})->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::resource('/student', StudentController::class);
Route::resource('/room', RoomController::class);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/contact', [EmailController::class, 'index']);
Route::post('/contact', [EmailController::class, 'contact'])->name('contact.action');
Route::get('/student-import', [StudentController::class, 'import'])->name('student.import');
Route::get('/student-export', [StudentController::class, 'export'])->name('student.export');
Route::post('/student-import', [StudentController::class, 'import'])->name('student.import');
Route::get('/teacher-import', [TeachersController::class, 'import_teachers'])->name('teachers.import_teachers');
Route::post('/teacher-import', [TeachersController::class, 'import_teachers'])->name('teachers.import_teachers');


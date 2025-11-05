<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [ProfilController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian.index');
Route::post('/guardian', [GuardianController::class, 'store'])->name('guardian.store');
Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom.index');
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');



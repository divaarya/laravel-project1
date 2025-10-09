<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudenController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [ProfilController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::get('/student', [StudenController::class, 'index'])->name('student');
Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian');
Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom.index');
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');









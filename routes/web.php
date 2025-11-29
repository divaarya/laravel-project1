<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\GuardianController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SubjectController;

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [ProfilController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian.index');
    Route::get('/guardian/create', [GuardianController::class, 'create'])->name('guardian.create');
    Route::post('/guardian', [GuardianController::class, 'store'])->name('guardian.store');
    Route::get('/guardian/{id}/edit', [GuardianController::class, 'edit'])->name('guardian.edit');
    Route::put('/guardian/{id}', [GuardianController::class, 'update'])->name('guardian.update');
    Route::delete('/guardian/{id}', [GuardianController::class, 'destroy'])->name('guardian.destroy');
    Route::get('/guardian/{id}/delete', [App\Http\Controllers\Admin\GuardianController::class, 'deletePage'])
    ->name('guardian.deletePage');
    
  
    Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom.index');
    Route::get('/classroom/create', [ClassroomController::class, 'create'])->name('classroom.create');
    Route::post('/classroom', [ClassroomController::class, 'store'])->name('classroom.store');
    Route::get('/classroom/{id}/edit', [ClassroomController::class, 'edit'])->name('classroom.edit');
    Route::put('/classroom/{id}', [ClassroomController::class, 'update'])->name('classroom.update');

Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::get('/teacher/{id}/delete', [TeacherController::class, 'deletePage'])
     ->name('teacher.deletePage');
Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])
     ->name('teacher.destroy');

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::get('/student/{id}/delete', [StudentController::class, 'confirmDelete'])
    ->name('student.deletePage');


Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
Route::put('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');


});

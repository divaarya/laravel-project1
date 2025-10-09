<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function index()
    {
        $judul = 'Teacher List';
        $teachers = Teacher::with('subject')->get();
        return view('teacher', compact('judul', 'teachers'));

    }
}

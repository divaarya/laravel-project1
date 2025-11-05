<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classroom')->get();
        return view('student.index', compact('students'));
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return response()->json($student);
    }
}

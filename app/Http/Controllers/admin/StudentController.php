<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class StudentController extends Controller
{
    public function index()
{
    $students = Student::with('classroom')->get();
    $classrooms = Classroom::all();

    return view('admin.student.index', compact('students', 'classrooms'));
}



public function create()
{
    $classrooms = Classroom::all();
    return view('admin.student.create', compact('classrooms'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'classroom_id' => 'nullable|exists:classrooms,id',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
    ]);

    Student::create($request->all());
    return redirect()->route('admin.student.index')->with('success', 'Student berhasil ditambahkan!');
}

public function edit($id)
{
    $student = Student::findOrFail($id);
    $classrooms = Classroom::all();
    return view('admin.student.edit', compact('student', 'classrooms'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'classroom_id' => 'nullable|exists:classrooms,id',
        'email' => 'nullable|email',
        'address' => 'nullable|string',
        'birthday' => 'nullable|date',

    ]);

    $student = Student::findOrFail($id);
    $student->update($request->all());
    return redirect()->route('admin.student.index')->with('success', 'Student berhasil diperbarui!');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();
    return redirect()->route('admin.student.index')->with('success', 'Student berhasil dihapus!');
}

public function confirmDelete($id)
{
    $student = Student::findOrFail($id);
    return view('admin.student.delete', compact('student'));
}
}
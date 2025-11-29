<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();
        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('teacher.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'nullable|exists:subjects,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teacher.index')->with('success', 'Guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $subjects = Subject::all();
        return view('teacher.edit', compact('teacher', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'nullable|exists:subjects,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());

        return redirect()->route('teacher.index')->with('success', 'Guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'Guru berhasil dihapus!');
    }
}

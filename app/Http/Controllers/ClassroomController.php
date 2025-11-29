<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classroom.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classroom.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:50',
            'capacity' => 'required|integer',
            'homeroom_teacher' => 'required|string|max:255',
        ]);

        Classroom::create($validated);
        return redirect()->route('classroom.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classroom.edit', compact('classroom'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:50',
            'capacity' => 'required|integer',
            'homeroom_teacher' => 'required|string|max:255',
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update($validated);

        return redirect()->route('classroom.index')->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
        return redirect()->route('classroom.index')->with('success', 'Kelas berhasil dihapus!');
    }
}

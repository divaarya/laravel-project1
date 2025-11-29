<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:teachers',
            'phone' => 'nullable'
        ]);

        Teacher::create($request->all());

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher created');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
        ]);

        $teacher->update($request->all());

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher updated');
    }

    public function deletePage($id)
{
    $teacher = Teacher::findOrFail($id);
    return view('admin.teacher.delete', compact('teacher'));
}



    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher deleted');
    }
}
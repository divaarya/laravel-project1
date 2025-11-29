<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('admin.classroom.index', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classrooms,name',
            'description' => 'nullable|string'
        ]);

        Classroom::create($request->all());
        return redirect()->route('admin.classroom.index')->with('success', 'Classroom berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('admin.classroom.edit', compact('classroom'));
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:classrooms,name,' . $classroom->id,
            'description' => 'nullable'
        ]);

        $classroom->update($request->all());
        return redirect()->route('admin.classroom.index')->with('success', 'Classroom berhasil diperbarui!');
    }

// public function deletePage($id)
// {
//     $classroom = Classroom::findOrFail($id);

//     return view('admin.classroom.delete', compact('classroom'));
// }

// public function destroy($id)
// {
//     $classroom = Classroom::findOrFail($id);

//     $classroom->delete();

//     return redirect()->route('admin.classroom.index')
//         ->with('success', 'Classroom berhasil dihapus.');
// }
    
}

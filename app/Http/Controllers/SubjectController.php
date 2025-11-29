<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('subject.index', [
            'subjects' => $subjects,
            'judul' => 'Daftar Subject'
        ]);
    }

    public function create()
    {
        return view('subject.create', [
            'judul' => 'Tambah Subject'
        ]);
    }

    public function store(Request $request)
    {
        $subject = Subject::create([
            'name' => $request->name,
            'description' => $request->description,
            'teacher_name' => $request->teacher_name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return response()->json($subject);
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $subject->update([
            'name' => $request->name,
            'description' => $request->description,
            'teacher_name' => $request->teacher_name,
            'phone' => $request->phone,
            'address' => $request->address,
        
        ]);

        return redirect()->route('subject.index')->with('success', 'Subject berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject berhasil dihapus.');
    }
}

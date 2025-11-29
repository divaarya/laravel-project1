<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Tampilkan daftar semua student.
     */
    public function index()
    {
        // Ambil semua data student beserta relasi classroom-nya
        $students = Student::with('classroom')->get();

        // Kirim ke view
        return view('student.index', compact('students'));
    }

    /**
     * Tampilkan form tambah student baru.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Simpan student baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'classroom_id' => 'required|integer',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
            'gender' => 'required|string',
            'birthday' => 'required|date',
        ]);

        Student::create($request->all());

        return redirect()->route('student.index')->with('success', 'Student berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit student.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update data student.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'classroom_id' => 'required|integer',
            'email' => 'required|email|unique:students,email,' . $id,
            'address' => 'required|string',
            'gender' => 'required|string',
            'birthday' => 'required|date',
        ]);

        $student->update($request->all());

        return redirect()->route('student.index')->with('success', 'Student berhasil diperbarui!');
    }

    /**
     * Hapus data student.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();

        return view('teacher.index', [
            'teachers' => $teachers,
            'judul' => 'Daftar Guru'
        ]);
    }

    public function store(Request $request)
    {
        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'subject_id' => null, // sementara manual
        ]);

        return response()->json($teacher);
    }
}

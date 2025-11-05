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
}

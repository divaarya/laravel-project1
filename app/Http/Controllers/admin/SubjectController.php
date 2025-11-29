<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subject.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects',
            'description' => 'nullable',
            'teacher_name' => 'nullable',
            'phone' => 'nullable'
        ]);

        Subject::create($request->all());
        return redirect()->route('admin.subject.index')->with('success', 'Subject created');
    }

   public function edit($id)
{
    $subject = Subject::findOrFail($id);
    return view('admin.subject.edit', compact('subject'));
}

public function update(Request $request, $id)
{
    $subject = Subject::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'code' => 'required',
    ]);

    $subject->update($request->all());

    return redirect()->route('subject.index')
                     ->with('success', 'Subject updated');
}



// public function deletePage($id)
// {
//     $subject = Subject::findOrFail($id);
//     return view('admin.subject.delete', compact('subject'));
// }

// public function destroy($id)
// {
//     $subject = Subject::findOrFail($id);
//     $subject->delete();

//     return redirect()->route('admin.subject.index')
//                      ->with('success', 'Subject berhasil dihapus.');
// }
}   
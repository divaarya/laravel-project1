<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianController extends Controller
{
    public function index()
    {
        $guardians = Guardian::all();
        return view('admin.guardian.index', compact('guardians'));
    }

    public function create()
    {
        return view('admin.guardian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'job' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'address' => 'nullable',
        ]);

        Guardian::create($request->all());

        return redirect()->route('admin.guardian.index')->with('success', 'Guardian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $guardian = Guardian::findOrFail($id);
        return view('admin.guardian.edit', compact('guardian'));
    }

    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $guardian->update($request->all());

        return redirect()->route('admin.guardian.index')->with('success', 'Guardian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();

        return redirect()->route('admin.guardian.index')->with('success', 'Guardian berhasil dihapus!');
    }

    public function deletePage($id)
    {
        $guardian = Guardian::findOrFail($id);
        return view('admin.guardian.delete', compact('guardian'));
    }
}

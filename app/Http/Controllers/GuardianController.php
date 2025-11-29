<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianController extends Controller
{
    public function index()
    {
        $guardians = Guardian::all();
        return view('guardian.index', compact('guardians'));
    }

    public function create()
    {
        return view('guardian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Guardian::create($request->all());
        return redirect()->route('guardian.index')->with('success', 'Data Guardian berhasil ditambahkan!');
    }

    public function edit(Guardian $guardian)
    {
        return view('guardian.edit', compact('guardian'));
    }

    public function update(Request $request, Guardian $guardian)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $guardian->update($request->all());
        return redirect()->route('guardian.index')->with('success', 'Data Guardian berhasil diperbarui!');
    }

    public function destroy(Guardian $guardian)
    {
        $guardian->delete();
        return redirect()->route('guardian.index')->with('success', 'Data Guardian berhasil dihapus!');
    }
}

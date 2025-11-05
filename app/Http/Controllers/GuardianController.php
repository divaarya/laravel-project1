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

    public function store(Request $request)
    {
        $guardian = Guardian::create($request->all());
        return response()->json($guardian);
    }
}

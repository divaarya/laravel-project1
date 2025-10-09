<?php


namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Teacher::with('subject')->get();
        return view('subjects', compact('subjects'));
    }
}

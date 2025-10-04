<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
{
    return view ('classroom', ['title' => "Daftar Classroom"]);
}

}

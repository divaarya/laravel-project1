<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            // $students = [
            //     [
            //         'id' =>1,
            //         'name' =>'Arya',
            //         'grade' =>'11 pplg 2',
            //         'email' =>"arya123@gmail.com",
            //         'addres' =>'kudus'
            //     ],
            //     [
            //         'id' =>2,
            //         'name' =>'rengga santoso',
            //         'grade' =>'11 pplg 2',
            //         'email' =>"rengga@gmail.com",
            //         'addres' =>'jepara'
            //     ],
            //     [
            //         'id' =>3,
            //         'name' =>'Paruq Lestari',
            //         'grade' =>'11 pplg 2',
            //         'email' =>"dapi@gmail.com",
            //         'addres' =>'semarang'
            //     ],
            //     [
            //         'id' =>4,
            //         'name' =>'alip Pratama',
            //         'grade' =>'11 pplg 2',
            //         'email' =>"alip@gmail.com",
            //         'addres' =>'demak'
            //     ],
            //     [
            //         'id' =>5,
            //         'name' =>'unyub wulandari',
            //         'grade' =>'11 pplg 2',
            //         'email' =>"unyub@gmail.com",
            //         'addres' =>'pati'
            //     ]

            //     ];

                $students = \App\Models\Student::all();
            return view('student', [
                'title' => "Student", 
                'students' => $students
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

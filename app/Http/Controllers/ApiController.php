<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class ApiController extends Controller
{
    public function getAllStudents(){
        // logic
    }

    public function createStudent(Request $request){
        $student = new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();

        return response()->json([
            "message" => "Student record created successfully!"
        ], 201);
    }   

    public function getStudent($id){
        // logic
    }

    public function updateStudent(Request $request, $id){
        // logic
    }

    public function deleteStudent($id){
        // logic
    }
}

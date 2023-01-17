<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class ApiController extends Controller
{
    public function getAllStudents(){
        $students = Student::get();

        return response()->json(["students" => $students], 201);
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
        if(Student::where("id", $id)->exists()){
            $student = Student::where("id", $id)->get();

            return response()->json($student, 200);
        }else{
            return response()->json([
                "message" => "Record not found!"
            ], 404);
        }
    }

    public function updateStudent(Request $request, $id){
        if(Student::where("id", $id)->exists()){
            $student = Student::find($id);
            // we could also use is_null()
            $student->name = $request->name? $request->name : $student->name;
            $student->course = $request->course? $request->course : $student->course;
            $student->save();

            return response()->json([
                "message" => "Record updated successfully",
            ], 200);
        }else{
            return response()->json([
                "message" => "Record not found!"
            ], 404);
        }
    }

    public function deleteStudent($id){
        if(Student::where("id", $id)->exists()){
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                "message" => "Record deleted successfully"
            ], 202);
        }else{
            return response()->json([
                "message" => "Record not found!"
            ], 404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the student.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with(['courses'])->paginate(15);
        return (StudentResource::collection($students))->response()->setStatusCode(206);
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create($request->all());

        return (new StudentResource($student))->response()->setStatusCode(201);
    }

    /**
     * Display the specified student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with(['courses'])->findOrFail($id);
        if($student){
            return (new StudentResource($student))->response()->setStatusCode(200);
        }
        return (StudentResource::collection(Student::with(['courses'])->all()))->response()->setStatusCode(404);
    }

    /**
     * Update the specified student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::with(['courses'])->findOrFail($id);
        $student->update($request->all());

        return (new StudentResource($student))->response()->setStatusCode(202);

    }

    /**
     * Remove the specified student from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::with(['courses'])->findOrFail($id);
        $students = Student::with(['courses'])->all();

        if($student->delete()){
            return (StudentResource::collection($students))->response()->setStatusCode(200);
        }
        return (new StudentResource($student))->response()->setStatusCode(404);
        
    }
}

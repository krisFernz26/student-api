<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with(['students'])->paginate(15);
        return (CourseResource::collection($courses))->response()->setStatusCode(206);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());

        return (new CourseResource($student))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with(['students'])->findOrFail($id);
        if($course){
            return (new CourseResource($course))->response()->setStatusCode(200);
        }
        return (CourseResource::collection(Course::with(['students'])->all()))->response()->setStatusCode(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::with(['students'])->findOrFail($id);
        $course->update($request->all());

        return (new CourseResource($course))->response()->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::with(['students'])->findOrFail($id);
        $courses = Course::with(['students'])->all();

        if($student->delete()){
            return (CourseResource::collection($courses))->response()->setStatusCode(200);
        }
        return (new CourseResource($course))->response()->setStatusCode(404);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\Lectivo;
use App\Models\Course;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Requests\StoreTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::where('user_id', auth()->user()->id)->first();
        if ($teacher) {
            $sedes = $teacher->sedes;
        } else {
            $message = auth()->user()->name . ' ' . __('is not registered as a teacher');

            flash()->options([
                'timeout' => 1000,
            ])->error($message);
            return redirect()->back();
        }
        //$courses = Lectivo::where('teacher_id', $teacher->user_id)->get();
        $courses = DB::table('lectivos')->where('teacher_id', $teacher->user_id)->get();
        //dd($courses);

        return view('teachers.index', compact('teacher', 'sedes', 'courses')); //
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
    public function store(StoreTeacherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //$course = Lectivo::where('teacher_id', $teacher->user_id)->first();
        return view('teachers.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    public function course(Teacher $teacher, Lectivo $lectivo)
    {
        $course = DB::table('courses')->where('id', $lectivo->course_id)->first();

        //dd($course->requeriments);

        return view('teachers.course', compact('teacher', 'course', 'lectivo'));
    }

}

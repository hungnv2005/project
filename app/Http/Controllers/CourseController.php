<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function show($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        $lesions = DB::table('lesions')->where('course_id', $id)->get();

        return view('course', compact('course', 'lesions'));
    }
}

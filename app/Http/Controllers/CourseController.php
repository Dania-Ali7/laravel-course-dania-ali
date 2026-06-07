<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('courses', compact('courses'));
    }

    public function create(Request $request)
    {
        $course = new Course;
        $course->name = $request->name;
        $course->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $courses = Course::all();

        return view('courses', compact('course', 'courses'));
    }

    public function update(Request $request)
    {
        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->save();

        return redirect('courses');
    }
}

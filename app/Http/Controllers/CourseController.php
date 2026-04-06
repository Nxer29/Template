<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('name')->get();
        return view('courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Course aangemaakt.');
    }

    public function show(Course $course)
    {
        $course->load('teacher', 'students');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $teachers = Teacher::orderBy('name')->get();
        return view('courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Course bijgewerkt.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course verwijderd.');
    }

}

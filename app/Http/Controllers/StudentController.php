<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course.teacher')->latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::with('teacher')->orderBy('title')->get();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'birth_date' => 'nullable|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student aangemaakt.');
    }

    public function show(Student $student)
    {
        $student->load('course.teacher');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $courses = Course::with('teacher')->orderBy('title')->get();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'birth_date' => 'nullable|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student bijgewerkt.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student verwijderd.');
    }
}
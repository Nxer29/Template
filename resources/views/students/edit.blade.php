@extends('layouts.app')

@section('content')
    <h1>Student bewerken</h1>

    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf @method('PUT')
        <div>
            <label>Voornaam</label>
            <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}">
        </div>
        <div>
            <label>Achternaam</label>
            <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}">
        </div>
        <div>
            <label>Geboortedatum</label>
            <input type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}">
        </div>
        <div>
            <label>Course</label>
            <select name="course_id">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" @selected($student->course_id == $course->id)>
                        {{ $course->title }} ({{ $course->teacher->name ?? 'Geen teacher' }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Updaten</button>
    </form>
@endsection
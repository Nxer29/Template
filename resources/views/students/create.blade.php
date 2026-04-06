@extends('layouts.app')

@section('content')
    <h1>Nieuwe student</h1>

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div>
            <label>Voornaam</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}">
        </div>
        <div>
            <label>Achternaam</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Geboortedatum</label>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}">
        </div>
        <div>
            <label>Course</label>
            <select name="course_id">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->title }} ({{ $course->teacher->name ?? 'Geen teacher' }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Opslaan</button>
    </form>
@endsection
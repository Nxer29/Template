@extends('layouts.app')

@section('content')
    <h1>Course bewerken</h1>

    <form method="POST" action="{{ route('courses.update', $course) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titel</label><br>
            <input id="title" type="text" name="title" value="{{ old('title', $course->title) }}">
            @error('title')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="code">Code</label><br>
            <input id="code" type="text" name="code" value="{{ old('code', $course->code) }}">
            @error('code')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="teacher_id">Teacher</label><br>
            <select id="teacher_id" name="teacher_id">
                <option value="">-- Kies een teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" @selected(old('teacher_id', $course->teacher_id) == $teacher->id)>
                        {{ $teacher->name }} ({{ $teacher->email }})
                    </option>
                @endforeach
            </select>
            @error('teacher_id')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit">Updaten</button>
        <a href="{{ route('courses.index') }}">Annuleren</a>
    </form>
@endsection
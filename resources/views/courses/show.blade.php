@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Course details</h4>
        <div>
            <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning btn-sm">Bewerken</a>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm">Terug</a>
        </div>
    </div>
    <div class="card-body">
        <p><strong>Titel:</strong> {{ $course->title }}</p>
        <p><strong>Code:</strong> {{ $course->code }}</p>
        <p><strong>Teacher:</strong> {{ $course->teacher->name ?? '-' }}</p>

        <hr>
        <h5>Ingeschreven studenten</h5>
        @if($course->students->count())
            <ul class="mb-0">
                @foreach($course->students as $student)
                    <li>
                        {{ $student->first_name }} {{ $student->last_name }} ({{ $student->email }})
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted mb-0">Nog geen studenten in deze course.</p>
        @endif
    </div>
</div>
@endsection
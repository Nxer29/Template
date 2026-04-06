@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Student details</h4>
        <div>
            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Bewerken</a>
            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">Terug</a>
        </div>
    </div>
    <div class="card-body">
        <p><strong>Voornaam:</strong> {{ $student->first_name }}</p>
        <p><strong>Achternaam:</strong> {{ $student->last_name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Geboortedatum:</strong> {{ $student->birth_date ?? '-' }}</p>
        <p><strong>Course:</strong> {{ $student->course->title ?? '-' }}</p>
        <p><strong>Teacher:</strong> {{ $student->course->teacher->name ?? '-' }}</p>
    </div>
</div>
@endsection
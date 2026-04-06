@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Teacher details</h4>
        <div>
            <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">Bewerken</a>
            <a href="{{ route('teachers.index') }}" class="btn btn-secondary btn-sm">Terug</a>
        </div>
    </div>
    <div class="card-body">
        <p><strong>Naam:</strong> {{ $teacher->name }}</p>
        <p><strong>Email:</strong> {{ $teacher->email }}</p>
        <p><strong>Specialisatie:</strong> {{ $teacher->specialization ?: '-' }}</p>

        <hr>
        <h5>Courses van deze teacher</h5>
        @if($teacher->courses->count())
            <ul class="mb-0">
                @foreach($teacher->courses as $course)
                    <li>{{ $course->title }} ({{ $course->code }})</li>
                @endforeach
            </ul>
        @else
            <p class="text-muted mb-0">Deze teacher heeft nog geen courses.</p>
        @endif
    </div>
</div>
@endsection
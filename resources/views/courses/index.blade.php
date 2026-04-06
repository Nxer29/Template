@extends('layouts.app')

@section('content')
    <h1>Courses</h1>
    <a href="{{ route('courses.create') }}">+ Nieuwe course</a>

    <table>
        <thead>
            <tr>
                <th>Titel</th>
                <th>Code</th>
                <th>Teacher</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->teacher->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Verwijderen?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nog geen courses gevonden.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $courses->links() }}
@endsection
@extends('layouts.app')

@section('content')
    <h1>Students</h1>
    <a href="{{ route('students.create') }}">+ Nieuwe student</a>

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Course</th>
                <th>Teacher</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->course->title ?? '-' }}</td>
                    <td>{{ $student->course->teacher->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Verwijderen?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
@endsection
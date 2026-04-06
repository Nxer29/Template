@extends('layouts.app')

@section('content')
    <h1>Teachers</h1>
    <a href="{{ route('teachers.create') }}">+ Nieuwe teacher</a>

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Specialisatie</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->specialization ?: '-' }}</td>
                    <td>
                        <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Verwijderen?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nog geen teachers gevonden.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $teachers->links() }}
@endsection
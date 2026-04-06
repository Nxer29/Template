@extends('layouts.app')

@section('content')
    <h1>Teacher bewerken</h1>

    <form method="POST" action="{{ route('teachers.update', $teacher) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam</label><br>
            <input id="name" type="text" name="name" value="{{ old('name', $teacher->name) }}">
            @error('name')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email</label><br>
            <input id="email" type="email" name="email" value="{{ old('email', $teacher->email) }}">
            @error('email')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="specialization">Specialisatie</label><br>
            <input id="specialization" type="text" name="specialization" value="{{ old('specialization', $teacher->specialization) }}">
            @error('specialization')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit">Updaten</button>
        <a href="{{ route('teachers.index') }}">Annuleren</a>
    </form>
@endsection
@extends('layouts.master')

@section('title', 'Welcome')

@section('content') <h2>Welcome to Films App</h2> <p>This is the welcome page.</p>

```
<h3>Add new film</h3>

{{-- Error personalizado (film duplicado, etc.) --}}
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

{{-- Errores de validación --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('film') }}">
    @csrf

    <div class="form-group">
        <label for="name">Film name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="year">Year</label>
        <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
    </div>

    <div class="form-group">
        <label for="genre">Genre</label>
        <input type="text" name="genre" class="form-control" value="{{ old('genre') }}" required>
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input type="text" name="country" class="form-control" value="{{ old('country') }}" required>
    </div>

    <div class="form-group">
        <label for="duration">Duration (minutes)</label>
        <input type="number" name="duration" class="form-control" value="{{ old('duration') }}" required>
    </div>

    <div class="form-group">
        <label for="image">Image URL</label>
        <input type="text" name="image" class="form-control" value="{{ old('image') }}" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Add film</button>
</form>
```

@endsection

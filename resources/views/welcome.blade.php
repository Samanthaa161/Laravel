@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <h2>Welcome to Films App</h2>
    <img src="{{ asset('img/FILM.png') }}" width="300" class="mb-3">
    <p>This is the welcome page.</p>

    <h3>Add new film</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('film') }}">
        @csrf

        <div class="form-group">
            <label for="title">Film title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Add film</button>
    </form>

@endsection

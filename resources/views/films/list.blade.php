@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Films list</h2>

    <!-- Botones para ordenar -->
    <div class="d-flex mb-3">
        <a href="{{ route('films.old') }}" class="btn btn-outline-primary mr-2">
            Oldest first
        </a>
        <a href="{{ route('films.new') }}" class="btn btn-outline-secondary">
            Newest first
        </a>
    </div>

    @if(count($films) > 0)
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                    <tr>
                        <td>{{ $film['title'] }}</td>
                        <td>{{ $film['year'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            No films available.
        </div>
    @endif
</div>
@endsection

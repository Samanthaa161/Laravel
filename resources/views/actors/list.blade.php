@extends('layouts.master')

@section('title', 'Actors list')

@section('content')

<h2>Actors list</h2>

@if($actors->isEmpty())
    <p>No actors found.</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Birthdate</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actors as $actor)
                <tr>
                    <td>{{ $actor->id }}</td>
                    <td>{{ $actor->name }}</td>
                    <td>{{ $actor->surname }}</td>
                    <td>{{ $actor->birthdate }}</td>
                    <td>{{ $actor->country }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
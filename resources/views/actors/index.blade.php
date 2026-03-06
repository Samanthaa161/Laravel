@extends('layouts.master')

@section('title', 'Actors')

@section('content')

<h2>Lista de Actores</h2>

<ul>
    <li>
        <a href="{{ route('actors.list') }}">Actores</a>
    </li>

    <li>
        <a href="{{ route('actors.count') }}">Contador de Actores</a>
    </li>
</ul>

@endsection
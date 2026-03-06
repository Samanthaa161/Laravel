@extends('layouts.master')

@section('title', 'Actors count')

@section('content')

<h2>Actors count</h2>

<p>Total actors: <strong>{{ $count }}</strong></p>

<a href="{{ route('actors.list') }}">Actors list</a>

@endsection
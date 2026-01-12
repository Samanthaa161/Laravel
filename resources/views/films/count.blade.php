@extends('layouts.master')

@section('title', 'Count films')

@section('content')
    <h2>Total films</h2>

    <p>Total number of films: <strong>{{ $filmCount }}</strong></p>
@endsection

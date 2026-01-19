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

        @if (count($films) > 0)
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th>Country</th>
                        <th>Duration (min)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr>
                            <td>{{ $film['title'] }}</td>
                            <td>{{ $film['year'] }}</td>
                            <td>{{ $film['genre'] }}</td>
                            <td>{{ $film['country'] }}</td>
                            <td>{{ $film['duration'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr class="my-5">

            <div class="row">

                <!-- Films by Genre -->
                <div class="col-md-6">
                    <h4 class="mb-3">Films by genre</h4>

                    <div class="accordion" id="genreAccordion">
                        @foreach ($filmsByGenre as $genre => $group)
                            <div class="card">
                                <div class="card-header" id="headingGenre{{ $loop->index }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseGenre{{ $loop->index }}">
                                            {{ $genre }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseGenre{{ $loop->index }}" class="collapse" data-parent="#genreAccordion">
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($group as $film)
                                                <li>{{ $film['title'] }} ({{ $film['year'] }})</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Films by Year -->
                <div class="col-md-6">
                    <h4 class="mb-3">Films by year</h4>

                    <div class="accordion" id="yearAccordion">
                        @foreach ($filmsByYear as $year => $group)
                            <div class="card">
                                <div class="card-header" id="headingYear{{ $loop->index }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseYear{{ $loop->index }}">
                                            {{ $year }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseYear{{ $loop->index }}" class="collapse" data-parent="#yearAccordion">
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($group as $film)
                                                <li>{{ $film['title'] }} ({{ $film['genre'] }})</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @else
            <div class="alert alert-warning">
                No films available.
            </div>
        @endif
    </div>
@endsection

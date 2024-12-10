@extends('layouts.front')

@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="search-results-section">
    <div class="container">
        <h2>Search Results for "{{ request()->get('query') }}"</h2>

        @if ($movies->count())
            <div class="row">
                @foreach ($movies as $movie)
                    <div class="col-md-4">
                        <div class="movie-item">
                            <img src="{{ asset('assets/admin/uploads/' . $movie->episodes->first()->photo) }}" alt="{{ $movie->name }}" class="img-responsive">
                            <h4><a href="{{ route('movies.show', $movie->id) }}">{{ $movie->name }}</a></h4>
                            <p>{{ Str::limit($movie->description, 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination">
                {{ $movies->links() }}
            </div>
        @else
            <p>No results found for "{{ request()->get('query') }}"</p>
        @endif
    </div>
</div>
@endsection

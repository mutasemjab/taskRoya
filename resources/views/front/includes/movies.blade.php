@extends('layouts.front')

@section('content')
<div class="buster-light">
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>{{ $category->name }} - Movies</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> {{ $category->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="topbar-filter fw">
                        <p>Found <span>{{ $movies->total() }} movies</span> in total</p>                     
                      
                    </div>
                    <div class="flex-wrap-movielist mv-grid-fw">
                        @foreach($movies as $movie)
                        <div class="movie-item-style-2 movie-item-style-1">
                            <img src="{{ asset('assets/admin/uploads/' . $movie->episodes->first()->photo) }}" alt="{{ $movie->name }}">
                            <div class="hvr-inner">
                                <a href="{{ route('movies.show', $movie->id) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="mv-item-infor">
                                <h6><a href="{{ route('movies.show', $movie->id) }}">{{ $movie->name }}</a></h6>
                                <p class="rate"><i class="ion-android-star"></i><span>{{ $movie->rating }}</span> /10</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="topbar-filter">
                        <label>Movies per page:</label>
                        <select>
                            <option value="range">20 Movies</option>
                            <option value="10">10 Movies</option>
                        </select>
                        
                        <div class="pagination2">
                            {{ $movies->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
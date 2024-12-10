@extends('layouts.front')


@section('content')
<div class="buster-light">
    <div class="hero mv-single-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1></h1>
                        <ul class="breadcumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span class="ion-ios-arrow-right"></span> {{ $movie->category->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single movie-single movie_single">
        <div class="container">
            <div class="row ipad-width2">
                <!-- Movie Poster -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="movie-img sticky-sb">
                        <img src="{{ asset('assets/admin/uploads/' . $movie->episodes->first()->photo) }}" alt="" class="img-responsive">
                        <div class="movie-btn mt-3">    
                            <div class="btn-transform transform-vertical red">
                                <div>
                                    <a href="#" class="item item-1 redbtn"> 
                                        <i class="ion-play"></i> Watch Trailer
                                    </a>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" class="item item-2 redbtn fancybox-media hvr-grow" onclick="openVideo('{{ asset('assets/admin/uploads/' . $movie->episodes->first()->video) }}')">
                                        <i class="ion-play"></i>
                                    </a>
                                    
                                </div>
                                
                                <!-- Modal for Video -->
                                <div id="videoModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); z-index: 9999;">
                                    <div style="position: relative; width: 80%; margin: 5% auto; background: #000; padding: 20px; border-radius: 8px;">
                                        <video id="videoPlayer" width="100%" controls>
                                            <source src="" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <button onclick="closeVideo()" style="position: absolute; top: 10px; right: 10px; background: red; color: white; border: none; border-radius: 50%; width: 30px; height: 30px; font-size: 16px;">×</button>
                                    </div>
                                </div>
                                
                           
                                
                            </div>
                            <div class="btn-transform transform-vertical mt-2">
                                <div>
                                    <a href="#" class="item item-1 yellowbtn"> 
                                        <i class="ion-card"></i> Buy ticket
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Movie Details -->
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content">
                        <h1 class="bd-hd">{{ $movie->name }} <span>{{ $movie->release_year }}</span></h1>
                        <div class="movie-rate mt-3">
                            <div class="rate">
                                <i class="ion-android-star"></i>
                                <p><span>7.5</span> /10</p>
                            </div>
                        </div>
                        <div class="movie-tabs mt-4">
                            <div class="tabs">
                                <ul class="tab-links tabs-mv">
                                    <li class="active"><a href="#overview">Overview</a></li>
                                    <li><a href="#moviesrelated"> Related Movies</a></li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Overview Tab -->
                                    <div id="overview" class="tab active">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p>{{ $movie->description }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="sb-it">
                                                    <h6>Genres:</h6>
                                                    <p>{{ $movie->category->name }}</p>
                                                </div>
                                               
                                                <div class="sb-it">
                                                    <h6>Run Time:</h6>
                                                    <p>{{ $movie->episodes->first()->duration }} mins</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="trailers">
                                        <div class="container">
                                            <div class="row ipad-width">
                                                <div class="col-md-12">
                                                    <div class="title-hd">
                                                        <h2>Episodes</h2>
                                                    </div>
                                                    <div class="episodes-list">
                                                        @foreach ($movie->episodes as $episode)
                                                            <div class="episode-item mb-4">
                                                                <div class="row">
                                                                    <!-- Episode Thumbnail -->
                                                                    <div class="col-md-4 col-sm-6">
                                                                        <img src="{{ asset('assets/admin/uploads/' . $episode->photo) }}" 
                                                                             alt="{{ $episode->name }}" 
                                                                             class="img-responsive episode-thumbnail">
                                                                    </div>
                                                                    <!-- Episode Details -->
                                                                    <div class="col-md-8 col-sm-6">
                                                                        <h4 class="episode-title">{{ $episode->name }}</h4>
                                                                        <p class="episode-description">{{ $episode->description }}</p>
                                                                        <p><strong>Duration:</strong> {{ $episode->duration }} mins</p>
                                                                        <p><strong>Show Time:</strong> {{ $episode->show_time }}</p>
                                                                        <!-- Watch Button -->
                                                                        <a href="javascript:void(0)" 
                                                                           class="btn btn-primary"
                                                                           onclick="openVideo('{{ asset('assets/admin/uploads/' . $episode->video) }}')">
                                                                           <i class="ion-play"></i> Watch Episode
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <!-- Related Movies Tab -->
                                    <div id="moviesrelated" class="tab">
                                        <h3 class="mb-4">Related Movies</h3>
                                        <div class="row">
                                            @foreach ($movie->relatedMovies as $related)
                                                <div class="col-md-4 col-sm-6 col-xs-12 mb-4">
                                                    <div class="movie-item-style-2">
                                                        <img src="{{ asset('assets/admin/uploads/' . $related->episodes->first()->photo) }}" alt="{{ $related->name }}" class="img-responsive">
                                                        <div class="mv-item-infor">
                                                            <h6><a href="{{ route('movies.show', $related->id) }}">{{ $related->name }}</a></h6>
                                                            <p class="rate">
                                                                <i class="ion-android-star"></i>
                                                                <span>8.5</span> /10
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Movie Details -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('.slider-for-2').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav-2'
});

$('.slider-nav-2').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for-2',
    dots: true,
    centerMode: true,
    focusOnSelect: true
});

    </script>
<script>
function openVideo(videoUrl) {
    console.log("Video URL:", videoUrl); // Debug log
    const videoPlayer = document.getElementById('videoPlayer');
    const modal = document.getElementById('videoModal');

    // Set video source
    videoPlayer.src = videoUrl;

    // Error handling
    videoPlayer.onerror = () => {
        console.error("Error loading video. URL:", videoUrl);
        alert('Error loading video. Please check the video format or path.');
    };

    // Play video
    videoPlayer.play().catch(error => {
        console.error("Playback error:", error);
        alert('Video playback failed. Please check the browser support or video file.');
    });

    // Show modal
    modal.style.display = 'block';
}



    function closeVideo() {
        const videoPlayer = document.getElementById('videoPlayer');
        videoPlayer.pause();
        videoPlayer.src = '';
        document.getElementById('videoModal').style.display = 'none';
    }
</script>
    
@endsection

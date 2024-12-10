@extends('layouts.front')

@section('content')
<div class="slider movie-items">
	<div class="container">
		<div class="row">
			<div class="social-link">
				<p>Follow us: </p>
				<a href="#"><i class="ion-social-facebook"></i></a>
				<a href="#"><i class="ion-social-twitter"></i></a>
				<a href="#"><i class="ion-social-googleplus"></i></a>
				<a href="#"><i class="ion-social-youtube"></i></a>
			</div>
	    	<div  class="slick-multiItemSlider">
				@php
				$products = App\Models\Product::inRandomOrder()->take(3)->get();
				@endphp
				@foreach ($products as $product)
				<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="{{route('movies.show',$product->id)}}"><img src="{{ asset('assets/admin/uploads') . '/' . $product->episodes->first()->photo }}" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<h6><a href="{{route('movies.show',$product->id)}}">{{$product->name}}</a></h6>
	    				<p><i class="ion-android-star"></i><span>{{$product->rating}}</span> /10</p>
	    			</div>
	    		</div>
				@endforeach
	    	
	    	</div>
	    </div>
	</div>
</div>
		<div class="buster-light">
<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				@php
				$categories = App\Models\Category::all(); // Retrieve all categories
			@endphp

			@foreach ($categories as $category)
			<div class="category-section">
				<div class="title-hd">
					<h2>{{ $category->name }}</h2>
					<a href="{{ route('category.movies', $category->id) }}" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>

				<div class="tabs">
					<ul class="tab-links">
						@php
							$types = App\Models\Type::all(); // Retrieve all types
						@endphp
						@foreach ($types as $type)
						<li><a href="#tab{{ $category->id }}-{{ $type->id }}">{{ $type->name }}</a></li>
						@endforeach
					</ul>
					<div class="tab-content">
						@foreach ($types as $type)
						<div id="tab{{ $category->id }}-{{ $type->id }}" class="tab {{ $loop->first ? 'active' : '' }}">
							<div class="row">
								<div class="slick-multiItem">
									@php
										$products = App\Models\Product::where('category_id', $category->id)
											->where('type_id', $type->id)
											->get();
									@endphp
									@foreach ($products as $product)
									<div class="slide-it">
										<div class="movie-item">
											<div class="mv-img">
												<img src="{{ asset('assets/admin/uploads/' . ($product->episodes->first()->photo ?? 'default.jpg')) }}" alt="" width="185" height="284">
											</div>
											<div class="hvr-inner">
												<a href=""> Read more <i class="ion-android-arrow-dropright"></i> </a>
											</div>
											<div class="title-in">
												<h6><a href="#">{{ $product->name }}</a></h6>
												<p><i class="ion-android-star"></i><span>{{ $product->rating }}</span> /10</p>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			@endforeach

			</div>
			
		</div>
	</div>
</div>


		</div>

@endsection
<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="{{route('home')}}"><img class="logo" src="{{asset('assets_front/images/logo.jpg')}}" alt="" width="119" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default" href="{{route('home')}}">
							Home 
							</a>
							
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Sections<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								@php
									$categories = App\Models\Category::get();
								@endphp	
								@foreach ($categories as $category)
								<li><a href="{{ route('category.movies', $category->id) }}">{{$category->name}} </a></li>
								@endforeach
							</ul>
						</li>
                        <li class=""><a href="{{route('front.about')}}">About Us</a></li>
						
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">               
						<li><a href="#">Help</a></li>
						@if (auth()->user())
						<li class=""><a href="{{route('logout')}}">LOG Out</a></li>
						@else
						<li class="loginLink"><a href="#">LOG In</a></li>
						<li class="btn signupLink"><a href="#">sign up</a></li>
						@endif
					
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- Top Search Form -->
		<div class="top-search">
			<!-- Add a form wrapper but keep the same structure -->
			<form action="{{ route('search') }}" method="GET" class="search-form">
				<!-- Dropdown for Categories -->
				<select name="category_id">
					<option value="" selected>All Categories</option>
					@foreach ($categories as $category)
						<option value="{{ $category->id }}" {{ request()->get('category_id') == $category->id ? 'selected' : '' }}>
							{{ $category->name }}
						</option>
					@endforeach
				</select>
		
				<!-- Search Input -->
				<input 
					type="text" 
					name="query" 
					placeholder="Search for a movie, TV Show or celebrity that you are looking for" 
					value="{{ request()->get('query') }}"
				>
		
				<!-- Submit Button -->
				<button type="submit">
					<i class="ion-ios-search"></i>
				</button>
			</form>
		</div>
		
	</div>
</header>

<style>
	/* Ensure the form doesn't affect other forms */
.search-form {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #1a1a1a; /* Match the top search background */
    padding: 10px;
    border: 1px solid #333; /* Optional: Match the border style */
    border-radius: 5px; /* Rounded corners */
}

/* Style the dropdown */
.search-form select {
    color: #fff;
    background-color: #2c2c2c;
    border: none;
    padding: 8px 12px;
    border-radius: 3px;
    margin-right: 10px;
}

/* Style the search input */
.search-form input[type="text"] {
    flex: 2; /* Allow it to take remaining space */
    padding: 8px 12px;
    border: none;
    background-color: #2c2c2c;
    color: #fff;
    border-radius: 3px;
    margin-right: 10px;
}

/* Style the submit button */
.search-form button {
    background-color: #ff5733;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 3px;
    cursor: pointer;
}

.search-form button i {
    font-size: 18px;
}

/* Ensure form aligns with the container */
.top-search {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #1a1a1a; /* Background to match */
    padding: 10px;
    border-radius: 5px;
}

	</style>
<!-- END | Header -->
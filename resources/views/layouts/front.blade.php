<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- index_light16:05-->
<head>
	<!-- Basic need -->
	<title>Roya Movies</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="{{asset('assets_front/css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('assets_front/css/style.css')}}">
   @yield('css')
</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="{{asset('assets_front/images/logo.jpg')}}" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action="{{ route('login.post') }}">
            @csrf
            <div class="row">
                <label for="username">
                    email:
                    <input type="text" name="email" id="username" placeholder="email@gmail.com"  required="required" />
                </label>
            </div>
            <div class="row">
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="******" required="required" />
                </label>
            </div>
            <div class="row">
                <div class="remember">
                    <div>
                        <input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
                    </div>
                    <a href="#">Forget password ?</a>
                </div>
            </div>
            <div class="row">
                <button type="submit">Login</button>
            </div>
        </form>
        
       
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post" action="{{ route('register.post') }}" enctype='multipart/form-data'>
            @csrf
            <div class="row">
                <label for="username-2">
                    Username:
                    <input type="text" name="name" id="username-2" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="email-2">
                    Your email:
                    <input type="email" name="email" id="email-2" placeholder="example@mail.com" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="********" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="repassword-2">
                    Re-type Password:
                    <input type="password" name="password_confirmation" id="repassword-2" placeholder="********" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="repassword-2">
                    Photo:
                    <input type="file" name="photo" required="required" />
                </label>
            </div>
            <div class="row">
                <button type="submit">Sign up</button>
            </div>
        </form>
        
    </div>
</div>
<!--end of signup form popup-->

@include('front.includes.navbar')
@include('front.includes.message')
@include('front.includes.content')

@include('front.includes.footer')

<script src="{{asset('assets_front/js/jquery.js')}}"></script>
<script src="{{asset('assets_front/js/plugins.js')}}"></script>
<script src="{{asset('assets_front/js/plugins2.js')}}"></script>
<script src="{{asset('assets_front/js/custom.js')}}"></script>
@yield('js')
</body>

<!-- index_light16:29-->
</html>
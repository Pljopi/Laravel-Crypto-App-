<!DOCTYPE html>
<html>

	<head>
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0">
		<title>
			Crypto cene
		</title>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('css/style.css') }}">
		<link
			rel="preconnect"
			href="https://fonts.googleapis.com">
		<link
			rel="preconnect"
			href="https://fonts.gstatic.com"
			crossorigin>
		<link
			href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
			rel="stylesheet">
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
			crossorigin="anonymous">

	</head>
	<body>
		@csrf
		<section
			class="header">
			
			<nav>
				<a
					href="">
					<img
						src="{{ asset('images/logo.png') }}">
				</a>
				<div
					class="nav-links">
					<ul>
						<li>
							<a
								href="{{url('favorite/list')}}">
								LIST
							</a>
						</li>
						<li>
							<a
								href="{{url('favorite')}}">
								FAVOURITES
							</a>
						</li>

						<li>
							
                            @auth
							<a href="{{url('/home')}}">HOME</a>
						</li>
						<li>
						    @else
                            <a href="{{route('login')}}">LOG IN HERE</a>
                        </li>
                        <li>
                                @if (Route::has('register'))
                                    <a href="{{route('register')}}">REGISTER</a>
                                @endif
                                @endauth
						</li>
                        @if(Auth::user())
                        <li>
                            <a href="{{route('logout')}}">LOG OUT</a>
                            <form method="get" action="{{ route('logout') }}">
                            @csrf
                            </li>
                        @endif

					</ul>
				</div>
			</nav>
        </section>

			<div
				class="text-box">
				
					<h1>
						Most accurate crypto prices
					</h1>
					<div class="container">
						@yield ('content')
						
					</div>

			

					<div
						class="footer">
						<footer>
							<p>
								&copy Crypto cene 2022
								<p> {{dd(Auth::user())}} </p>
							</p>
						</footer>
					</div>
			
			</div>
		</p>
	</body><script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
	crossorigin="anonymous"></script></html>


       
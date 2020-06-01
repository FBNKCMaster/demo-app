<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
		@stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
	<div id="app">
		<nav class="flex border-b">
			<div class="container flex flex-1 items-center justify-center mx-2">
				<div class="leading-none py-1">
					<a href="/" class="bg-gray-900 border border-gray-700 flex font-bold p-1 px-2 rounded text-2xl">
						<span class="text-red-500">x</span><span class="text-gray-200">Tenant</span>
					</a>
				</div>
				<div class="flex-1">
				</div>
				<div class="text-sm">
				@guest
					<a href="{{ route('login') }}" class="border p-1 px-2 rounded text-gray-700">{{ __('Login') }}</a>
					@if (Route::has('register'))
					<a href="{{ route('register') }}" class="bg-gray-700 border-gray-600 ml-1 p-1 px-2 rounded text-white">{{ __('Register') }}</a>
					@endif
					@else
					<div class="ml-3 relative">
						<div>
							<button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-white transition duration-150 ease-in-out" id="user-menu" aria-label="User menu" aria-haspopup="true">
								<span class="m-2">{{ Auth::user()->name }}</span>
								<img class="bg-gray-200 border h-8 w-8 rounded-full" src="" alt="" />
							</button>
						</div>
						<div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
							<div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
								<a href="{{ route('logout') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
								</a>
							</div>
						</div>
					</div>
					@endguest
				</div>
			</div>
		</nav>
		<main class="py-4">
			@yield('content')
		</main>
	</div>
</body>
</html>

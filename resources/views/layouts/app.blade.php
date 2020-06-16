<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
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
			<div class="container flex flex-1 items-center justify-center mx-auto px-2">
				<div class="leading-none py-1">
					<a href="/" class="bg-gray-900 border border-gray-700 flex font-bold p-1 px-2 rounded text-2xl">
						<span class="text-red-500">x</span><span class="text-gray-200">Tenant</span>
					</a>
				</div>
				<div class="flex-1">
				</div>
				<div class="flex items-center rounded px-1 text-sm">
				@guest
					<a href="{{ route('login') }}" class="border p-1 px-2 rounded text-gray-700">{{ __('Login') }}</a>
					@if (Route::has('register'))
					<a href="{{ route('register') }}" class="bg-gray-700 border-gray-600 ml-1 p-1 px-2 rounded text-white">{{ __('Register') }}</a>
					@endif
				@else
					<div @click.away="open = false" x-data="{ open: false }" class="ml-3 relative">
						<div>
							<button @click.prevent="open = true" class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-white transition duration-150 ease-in-out" id="user-menu" aria-label="User menu" aria-haspopup="true">
								<span class="m-2 text-xs">{{ Auth::user()->name }}</span>
								<div class="bg-center bg-cover bg-no-repeat bg-gray-200 border h-8 w-8 rounded-full" style="background-image: url({{ asset('profiles/' . Auth::id() . '.jpeg') }})"></div>
							</button>
						</div>
						<div x-show="open"
								x-transition:enter="transition ease-out duration-300"
								x-transition:enter-start="opacity-0 transform scale-90"
								x-transition:enter-end="opacity-100 transform scale-100"
								x-transition:leave="transition ease-in duration-300"
								x-transition:leave-start="opacity-100 transform scale-100"
								x-transition:leave-end="opacity-0 transform scale-90" class="origin-top-right absolute right-0 mt-2 w-48 rounded-b shadow-lg text-xs z-50">
							<div class="py-1 rounded-b bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
								<a href="/home" class="block px-4 py-1 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
								{{ __('Home') }}
								</a>
								<a href="{{ route('logout') }}" class="border-t block px-4 py-1 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
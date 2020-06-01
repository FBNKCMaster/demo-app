@extends('layouts.app')

@section('content')
<div class="container">
	<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
		<div class="max-w-md w-full">
			<div>
				<h1 class="font-bold text-5xl text-center">
					<span class="text-red-500">x</span><span class="text-gray-900">Tenant</span>
					<span class="font-normal text-gray-700">/ Demo App</span>
				</h1>
				<h2 class="mt-6 text-center text-2xl leading-9 font-extrabold text-gray-900">
					Register your account
				</h2>
			</div>
			<form class="mt-8" action="{{ route('register') }}" method="POST">
				@csrf
				@error('name')
				<div class="border-l-2 border-red-500 font-semibold m-2 px-2 text-red-500 text-xs" role="alert">{{ $message }}</div>
				@enderror
				@error('email')
				<div class="border-l-2 border-red-500 font-semibold m-2 px-2 text-red-500 text-xs" role="alert">{{ $message }}</div>
				@enderror
				@error('password')
				<div class="border-l-2 border-red-500 font-semibold m-2 px-2 text-red-500 text-xs" role="alert">{{ $message }}</div>
				@enderror
				<div class="rounded-md shadow-sm">
					<div>
						<input aria-label="{{ __('Name') }}" name="name" type="text" value="{{ old('name') }}" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('name') bg-red-300 text-red-600 @enderror" placeholder="{{ __('Name') }}" />
					</div>
					<div>
						<input aria-label="{{ __('E-Mail Address') }}" name="email" type="email" value="{{ old('email') }}" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-t-0 border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('email') bg-red-300 text-red-600 @enderror" placeholder="{{ __('E-Mail Address') }}" />
					</div>
					<div>
						<input aria-label="{{ __('Password') }}" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-t-0 border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('password') bg-red-300 text-red-600 @enderror" placeholder="{{ __('Password') }}" />
					</div>
					<div class="-mt-px">
						<input aria-label="{{ __('Confirm Password') }}" name="password_confirmation" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{ __('Confirm Password') }}" />
					</div>
				</div>

				<div class="mt-6">
					<button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 transition duration-150 ease-in-out">
						{{ __('Register') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

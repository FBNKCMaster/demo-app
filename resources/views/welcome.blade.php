@extends('layouts.app')

@section('content')
<div class="container mx-auto">
	<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
		<div class="max-w-md w-full">
			<div>
				<h1 class="font-bold text-4xl text-center">
                    <span class="bg-gray-900 border border-gray-700 p-2 px-4 rounded-lg shadow">
					    <span class="text-red-500">x</span><span class="text-gray-200">Tenant</span>
                    </span>
					<span class="font-normal mx-2 text-gray-700">Demo App</span>
				</h1>
			</div>
			<div class="border-t flex justify-center mt-4">
			@if (isset($tenants))
				@foreach($tenants as $tenant)
				<a href="{{ '//' . $tenant->subdomain . '.' . config()->get('xtenant.domain') }}" class="bg-gray-200 m-1 px-2 rounded text-center text-gray-700 hover:bg-gray-300">{{ $tenant->name }}</a>
				@endforeach
			@endif
			</div>
		</div>
	</div>
</div>
@endsection
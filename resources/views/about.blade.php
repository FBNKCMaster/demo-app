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
			<div class="border-t flex justify-center mt-4 text-gray-800 text-sm">
				<p class="text-center">
				This is a demo app for testing <b><a href="https://github.com/FBNKCMaster/xTenant" class="mx-1">xTenant</a></b> package.
				<br>
				You can use it to test any other package as well.
				</p>
			</div>
		</div>
	</div>
</div>
@endsection
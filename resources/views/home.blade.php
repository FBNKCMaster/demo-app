@extends('layouts.app')

@push('scripts')
	<script>
		window.onload = () => {
			function prevImage(input, placeholder) {
				const reader = new FileReader();
				reader.onload = e => {
					document.getElementById(placeholder).style.backgroundImage = 'url(' + e.target.result + ')';
				};
				document.getElementById(input).addEventListener('change', e => {
					const f = e.target.files[0];
					reader.readAsDataURL(f);
				});
			}
			prevImage('profile_input', 'profile');
			prevImage('cover_input', 'cover');
		};
	</script>
@endpush

@section('content')
<div class="container">
	<div class="flex items-center justify-center">
		<form class="border p-4 rounded shadow w-1/2" action="{{ route('update_profile') }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			@if ($errors->any())
				<div class="bg-red-200 border border-red-300 m-2 p-2 rounded text-red-600 text-sm">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<h2 class="text-2xl">Welcome, {{ Auth::user()->name }}!</h2>
			<p class="mt-2 text-gray-700 text-sm">Here are your informations:</p>
			<div class="border-t flex mt-4 p-2">
				<div class="flex-1 font-semibold text-gray-800 text-xs">Name</div>
				<div class="flex-1">
					<div class="border flex rounded-md shadow-sm">
						<input class="bg-gray-100 flex-1 p-1 px-2 rounded-md text-sm" name="name" value="{{ Auth::user()->name }}" />
					</div>
				</div>
			</div>
			<div class="border-t flex p-2">
				<div class="flex-1 font-semibold text-gray-800 text-xs">E-mail</div>
				<div class="flex-1">
					<div class="border flex rounded-md shadow-sm">
						<input class="bg-gray-100 flex-1 p-1 px-2 rounded-md text-sm" name="email" value="{{ Auth::user()->email }}" />
					</div>
				</div>
			</div>
			<div class="border-t flex p-2">
				<div class="flex-1 font-semibold text-gray-800 text-xs">Photo</div>
				<div class="flex-1">
					<div class="flex items-center">
						<div id="profile" class="bg-center bg-contain bg-no-repeat bg-gray-100 border h-12 rounded-full w-12 @error('profile') border-red-500 @enderror" style="background-image:url({{ asset('profiles/' . Auth::id() . '.jpeg') }});"></div>
						<label class="border cursor-pointer mx-2 p-1 px-2 rounded-md shadow text-xs" for="profile_input">Change</label>
						<input id="profile_input" class="hidden" type="file" name="profile" accept="image/*">
					</div>
				</div>
			</div>
			<div class="border-t flex p-2">
				<div class="flex-1 font-semibold text-gray-800 text-xs">Cover</div>
				<div class="flex-1">
					<label class="bg-gray-100 border border-dashed cursor-pointer flex relative rounded-md @error('cover') border-red-500 @enderror" for="cover_input">
						<div id="cover" class="bg-center bg-cover bg-no-repeat flex-1 h-0 rounded-md z-10" style="background-image:url({{ asset('covers/' . Auth::id() . '.jpeg') }});padding-bottom:50%;"></div>
						<div class="absolute flex inset-0 items-center justify-center z-0">
							<span class="text-gray-700 text-xs">+ Upload Image</span>
						</div>
						<input id="cover_input" class="hidden" type="file" name="cover" accept="image/*">
					</label>
				</div>
			</div>
			<div class="border-t flex justify-end p-2">
				<button class="bg-blue-500 border border-blue-400 mt-2 p-2 px-4 rounded-md shadow text-white ">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection

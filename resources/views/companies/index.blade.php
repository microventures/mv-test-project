@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<h3>Companies</h3>
			<hr>
		</div>
	</div>


	@foreach ($companies as $company)
	<div class="row">
		<div class="col">
			<img width="100" src="{{ $company->logo }}">
		</div>
		<div class="col">
			<p><a href="/companies/{{ $company->id }}">{{ $company->name }}</a> ({{-- 1. Display the total dollars raised here, as money --}})</p>
		</div>
	</div>
	@endforeach

</div>

@endsection

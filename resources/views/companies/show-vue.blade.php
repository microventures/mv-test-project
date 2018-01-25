@extends('app')

@section('content')

<div class="container">
    <company :company-id="{{ $id }}"></company>
</div>

@endsection

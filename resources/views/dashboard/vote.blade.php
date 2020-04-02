@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
vote works!

@foreach ($candidates as $candidate)
<div>
<img src="{{$candidate['img']}}" />
    {{$candidate['name']}} </div>
@endforeach

@endsection

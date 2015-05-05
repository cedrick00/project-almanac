@extends('front.tpl.main')

@section('meta-title')
	Home
@show
@section('css') {{-- additional css --}}
	@parent
	{{ HTML::style('assets/css/front/home.css') }}
	{{ HTML::style('assets/css/front/isotope.css') }}
@show

@section('content')

@stop

@section('js')
 {{ HTML::script('https://code.jquery.com/jquery-1.10.2.min.js') }}
 {{ HTML::script('assets/js/front/jquery.isotope.min.js') }}
 {{-- HTML::script('assets/js/front/script.js') --}}
@stop
@extends('admin.dashboard')

@section('meta-title')
    Login
@show
@section('css') {{-- additional css --}}
    @parent
    {{ HTML::style('assets/css/admin/signin.css') }}
@show
@section('topbar') {{-- hide topbar --}}
@stop



@section('js')
 {{ HTML::script('https://code.jquery.com/jquery-1.10.2.min.js') }}
 {{ HTML::script('assets/js/bootstrap.min.js') }}
@stop
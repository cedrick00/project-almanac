@extends('admin.tpl.main')

@section('meta-title')
	Dashboard
@show
@section('css') {{-- additional css --}}
	@parent
	{{ HTML::style('assets/css/admin/dashboard.css') }}
@show


    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="/admin/dashboard">Add Student</a></li>
            <li class="active"><a href="#">View Student</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       
            @if(Session::get('message'))
              <p class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('message') }}
              </p>          
            @endif

            <h1 class="page-header">Showing {{ $student->firstname }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>First name:</strong> {{ $student->firstname }}<br>
            <strong>Last name:</strong> {{ $student->lastname }}<br>
            <strong>Email:</strong> {{ $student->email }}<br>
            <strong>Birthday:</strong> {{ $student->birthday }}
        </p>
    </div>


        </div>
      </div>
    </div>



@section('js')
 {{ HTML::script('https://code.jquery.com/jquery-1.10.2.min.js') }}
 {{ HTML::script('assets/js/bootstrap.min.js') }}
 {{ HTML::script('assets/js/docs.min.js') }}
@stop
@extends('admin.tpl.main')


@section('css') {{-- additional css --}}

	{{ HTML::style('assets/css/admin/signin.css') }}

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Please sign up <small>It's free!</small></h3>
        </div>
        <div class="panel-body">
            @if (Session::has('message'))
          <div class="alert alert-info">{{ Session::get('message') }}</div>
      @endif
            {{ HTML::ul($errors->all()) }}
      {{ Form::open(array('url' => '/admin/register')) }}
               <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                      {{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-control login input-sm','placeholder' => 'First Name')) }}
                      </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                      {{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control login input-sm','placeholder' => 'Last Name')) }} 
                      </div>
                  </div>
              </div>

                <div class="form-group">
                     {{ Form::text('email', Input::old('email'), array('class' => 'form-control login input-sm','placeholder' => 'Email Address')) }}          
                </div>

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                          {{ Form::password('password', array ('class' => 'form-control login input-sm', 'placeholder' => 'Password')) }}
                      </div>
                   </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                        {{ Form::password('confirm', array('class' => 'form-control login input-sm', 'placeholder' => 'Confirm Password')) }}
                      </div>
                  </div>
                </div>

                <input type="submit" value="Register" class="btn btn-info btn-block">
              {{ Form::close() }}
               <a class="btn btn-info btn-block" href="{{ URL::to('admin/login') }}">Sign in Account</a>       
        </div>
      </div>
   </div>
</div>
@stop

@section('js')
 {{ HTML::script('https://code.jquery.com/jquery-1.10.2.min.js') }}
 {{ HTML::script('assets/js/bootstrap.min.js') }}
@stop
@extends('admin.tpl.main')

@section('meta-title')
	Dashboard
@show
@section('css') {{-- additional css --}}
	@parent
	{{ HTML::style('assets/css/admin/dashboard.css') }}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@show

@section('content') 
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

            @if(isset($errors) && $errors)
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif

            <h1 class="page-header">Showing {{ $student->firstname }}</h1>

            {{ Form::open(array('url'=> URL::to('admin/update/'.$student->id))) }}
                <div class="form-group">
                    {{ Form::label('name', 'First Name') }}
                    {{ Form::text('firstname', $student->firstname, array('class' => 'form-control')) }}
                </div>

                 <div class="form-group">
                    {{ Form::label('name', 'Last Name') }}
                    {{ Form::text('lastname', $student->firstname, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', $student->email, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('age', 'Birthday') }}
                  {{ Form::text('birthday', $student->birthday, array('class' => 'form-control input-sm','id' => 'datepicker')) }}
                </div>

        
            {{ Form::submit('Edit Student', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}


        </div>
      </div>
    </div>
@end


@section('js')
 {{ HTML::script('https://code.jquery.com/jquery-1.10.2.min.js') }}
 {{ HTML::script('assets/js/bootstrap.min.js') }}
 {{ HTML::script('assets/js/docs.min.js') }}
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange:'-50:+0',
      dateFormat: 'yy-mm-dd'
    });
  });
  </script>
@stop
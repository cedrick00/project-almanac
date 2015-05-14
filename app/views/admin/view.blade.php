@extends('admin.tpl.main')

@section('meta-title')
  Dashboard
@show
@section('css') {{-- additional css --}}
  @parent
  {{ HTML::style('assets/css/admin/dashboard.css') }}
@show
<script>

      var elems = document.getElementsByClassName('confirmation');
      var confirmIt = function (e) {
          if (!confirm('Are you sure?')) e.preventDefault();
      };
      for (var i = 0, l = elems.length; i < l; i++) {
          elems[i].addEventListener('click', confirmIt, false);
      }
</script>

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

 <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Student ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email</td>
            <td>Birthday</td>
            <td>Action</td>

        </tr>
    </thead>

    <tbody>
         @foreach($students as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->firstname }}</td>
            <td>{{ $value->lastname }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ date('d-M-Y', strtotime($value->birthday)) }}</td>
             <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/stud/' . $value->id) }}">View</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('admin/edit/'. $value->id) }}">Edit</a>
                <a class="btn btn-small btn-danger" href="{{ URL::to('admin/delete/' . $value->id)}}" onclick="return confirm('Are you sure want to delete?')">Delete</a>
             </td>
      
      
       </tr>
       @endforeach
    </tbody>
</table>
        </div>
      </div>
    </div>


@end


@section('js')
 {{ HTML::script('https://code.jquery.com/jquery-1.10.2.min.js') }}
 {{ HTML::script('assets/js/bootstrap.min.js') }}
 {{ HTML::script('assets/js/docs.min.js') }}
@stop
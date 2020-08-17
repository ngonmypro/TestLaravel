@extends('user.master')
@section('title', 'Create User')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12"><br>
      <h3 align="center"> Add User</h3><br>

      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $errors)
            <li>{{ $errors }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if(\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div>
      @endif

      <form action="{{route('user')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <input type="text" class="form-control" name="fname" placeholder="Input Name">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="lname" placeholder="Input Lastname">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

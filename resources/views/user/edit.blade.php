@extends('user.master')
@section('title', 'Edit User')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12"><br>
      <h3 align="center"> Edit User</h3><br>

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
      <form action="{{action('UsersController@update', $id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <input type="text" class="form-control" name="fname" placeholder="Input Name" value="{{$user->fname}}">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="lname" placeholder="Input Lastname"  value="{{$user->lname}}">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success" value="Save">
        </div>
        <input type="hidden" name="_method" value="PATCH">
      </form>
    </div>
  </div>
</div>
@endsection

@extends('user.master')
@section('title', 'Manage User')
@section('content')
<div class="container"><br>
  <div class="row">
    <div class="col-md-12">
      <div align="right">
        <a href="{{route('user.create')}}" class="btn btn-success">ADD USER</a>
        <a href="{{route('user.search')}}" class="btn btn-info">SEARCH</a>
        <a href="{{route('upload.index')}}" class="btn btn-primary">Upload</a>
        <a href="{{route('create.create')}}" class="btn btn-secondary">DataTables</a>
        <a href="{{route('auto.index')}}" class="btn btn-light">AutoComplete</a>
        <a href="{{route('product.index')}}" class="btn btn-outline-dark">Product</a>
        <a href="{{route('multipleupload.index')}}" class="btn btn-outline-secondary">Multiple Upload</a>
        <a href="{{route('cropimage.index')}}" class="btn btn-outline-info">Croppie Image</a>
      </div><br>

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

      <table class="table table-striped">
        <tr align="center">
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Manage</th>
        </tr>
        @foreach($users as $row)
        <tr>
          <td align="center">{{ $number }}</td>
          <td>{{$row['fname']}}</td>
          <td>{{$row['lname']}}</td>
          <td align="center">
            <a href="{{action('UsersController@edit', $row['id'])}}" class="btn btn-warning" style="display: inline;">Edit</a>
            <form class="delete_form" action="{{action('UsersController@destroy', $row['id'])}}" method="post" style="display: inline;">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{action('UsersController@downloadPDF', $row['id'])}}" class="btn btn-dark" style="display: inline;">PDF</a>
          </td>
        </tr>
        <?php $number += 1; ?>
        @endforeach
      </table>
      {{ $users->links() }}
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.delete_form').on('submit', function () {
      if (confirm("Delete data Yes/No.")) {
        return true;
      }
      else {
        return false;
      }
    });
  });
</script>
@endsection

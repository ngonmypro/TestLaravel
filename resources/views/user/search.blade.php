@extends('user.master')
@section('title', 'Search User')
@section('content')
<div class="container"><br>
  <div class="row">
    <div class="col-md-12">
      <h3 align="center">Search Data</h3>
      <div align="right">
        <a href="{{route('user.create')}}" class="btn btn-success">ADD USER</a>
      </div><br>
      <input type="text" name="search" id="search" placeholder="Search data" class="form-control"><br>
      <h4 align="center"> Number count : <span id="total_records"></span></h4>
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
          </tr>
        </thead>
        <tbody>

        </tbody>

      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      fetch_data();
    });

  $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_data(query);
  });

  function fetch_data(query = '')
  {
    $.ajax({
      url:"{{ route('user.action') }}",
      method: 'GET',
      data: {query:query},
      dataType: 'json',
      success:function(data)
      {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
      }
    })
  }
</script>
@endsection

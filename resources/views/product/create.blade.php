@extends('user.master')
@section('title', 'Manage User')
@section('content')
    <div class="container box"><br>
      <h3 align="center">New Product</h3>
      <!-- <div class="row"> -->
        <form method="post" action="{{url('product')}}">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control">
          </div>
          <label>Type</label>
            <select class="form-control" name="typename">
              <option value="0"> # Select # </option>
              <option value="1">Water drink</option>
              <option value="2">Electrical appliances</option>
              <option value="3">Stationary</option>
              <option value="4">Bag</option>
            </select>
            <br>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Save">
          </div>
        </form>
      <!-- </div> -->
    </div>
  </body>
</html>
@endsection

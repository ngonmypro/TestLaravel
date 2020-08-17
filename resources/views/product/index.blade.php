@extends('user.master')
@section('title', 'Manage User')
@section('content')
      <div class="container">
        <br><br>
        <h2 align="center">Data Producr</h2>
        <br>
        <div align="right">
          <a href="{{route('product.create')}}" class="btn btn-success">Add Product</a>
        </div>
        <!-- <div class="row"> -->
          <div class="col-md-12">
            <br><a href=""></a>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ number_format($row->price,2) }}</td>
                  <td>{{ $row->typeProduct->type_name }}</td>
                </tr>
              </tbody>
                @endforeach
            </table>
            {{ $products->links() }}
          </div>
        <!-- </div> -->
      </div>
@endsection

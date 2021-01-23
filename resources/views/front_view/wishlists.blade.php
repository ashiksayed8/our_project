@extends('layouts.app')
@section('content')

<section>
    <div class="container">
        <div class="row d-block">
            <div class="card">
                <div class="card-header">
                    <h3>Wish list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Action</th> 
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($product as $row)
                          <tr>
                            <td>{{$row->product_name}}</td>
                            <td><img src="{{ asset($row->product_image) }}" height="50px;" width="50px;" ></td> 
                            <td>{{$row->product_color}}</td>
                            <td>{{$row->product_size}}</td>  
                            <td>{{$row->selling_price}}</td> 
                            <td>
                              <a class="btn btn-danger" title="Remove" href="{{ url('add/cart/'.$row->id) }}">Add cart</i></a>     
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
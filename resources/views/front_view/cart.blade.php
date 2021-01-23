@extends('layouts.app')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3>Shopping cart</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th> 
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cart as $row)
                          <tr>
                            <td>{{$row->name}}</td>
                            <td><img src="{{ URL::to($row->options->image) }}" height="50px;" width="50px;" ></td> 
                            <td>{{$row->qty}}</td>
                            <td>{{$row->options->color}}</td>
                            <td>{{$row->options->size}}</td>  
                            <td>{{$row->price}}</td> 
                            <td> {{ $row->qty * $row->price }}</td>  
                            <td>
                              <a class="btn btn-danger" title="Remove" href="{{ url('remove/cart/'.$row->rowId) }}">X</i></a>     
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="card-footer">
                    <h2>Total:{{ Cart::subtotal() }} </h2>
                    {{-- <a class="btn btn-danger" title="Remove" href="{{ url('remove/cart/'.$row->rowId) }}">All Remove</i></a>   --}}
                    <a class="btn btn-primary" title="checkout" href="{{ route('user.checkout') }}">Checkout</i></a>  
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
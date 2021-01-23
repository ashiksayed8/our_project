@extends('layouts.app')
@section('content')
<section>
  @php
     $settings=DB::table('settings')->first();
     $charge=$settings->shipping_charge; 
  @endphp
  
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3>Check out</h3>
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
                   <div class="row">
                     <div class="col-4">
                       @if(Session::has('coupon')) 
                       @else 
                       <form action="{{ route('apply.coupon') }}" method="POST">
                        @csrf
                       <div class="form-group">
                        <h5>Apply coupon</h5>
                        <input type="text" class="form-control" name="coupon_name">
                       </div>
                       <button type="submit" class="btn btn-success">Submit</button>
                      </form>
                       @endif
                      
                     </div>
                     <div class="col-8 text-right">
                       <div class="order_total">
                         @if(Session::has('coupon')) 
                         <div>
                          <span class="bold">Order Total:</span> <span>${{ session::get('coupon')['balance'] }}</span>
                         </div>
                         <span>{{ session::get('coupon')['coupon_name'] }}:${{session::get('coupon')['coupon_discount']   }}</span> <a class="btn btn-danger" href="{{ route('remove.coupon') }}">X</a>                      
                         @else 
                         <span class="bold">Order Total:</span> <span>${{ Cart::subtotal() }}</span>
                         @endif
                        
                       </div>
                       <div class="shopping_charge">
                        <span class="bold">Shipping Charge:</span> <span>{{ ($charge) }}</span>
                      </div>
                      <hr>
                      @if(@Session('coupon'))
                      <div class="total">
                        <span class="bold">Total:</span> <span>${{ session::get('coupon')['balance'] + $charge }}</span>
                      </div>
                      @else 
                      <div class="total">
                        @php
                            
                           $var = Cart::subtotal();
                           $var1 = (float) str_replace(',', '', $var);
                          
                        @endphp
                        <span class="bold">Total:</span> <span>${{$var1 + $charge}}</span>
                      </div>
                      @endif 
           
                     </div>
                   </div>
                   
                   <div class="row mt-5">
                    <a href="{{ route('show.cart') }}" class="btn btn-outline-primary">Back</a>
                    <a href="{{ route('payment.step') }}" class="btn btn-primary ml-3">Final Step</a>
                  </div>  
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
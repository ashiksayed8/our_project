@extends('layouts.app')
@section('content')
<section>
  @php
     $settings=DB::table('settings')->first();
     $charge=$settings->shipping_charge; 
  @endphp
  
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
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
                       <div class="row">
                         <div class="col-4">
                      
                          
                         </div>
                         <div class="col-8 text-right">
                           <div class="order_total">
                                   @if(Session::has('coupon')) 
                                  <div>
                                    <span class="bold">Order Total:</span> <span>${{ session::get('coupon')['balance'] }}</span>
                                  </div>
                                  <span>{{ session::get('coupon')['coupon_name'] }}:${{session::get('coupon')['coupon_discount'] }}</span>                     
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


            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Shipping Address</h3>
                    </div>
                    <div class="card-body">
                     <form action={{ route('payment.process') }} method="post">
                        @csrf
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="inputname">First Name</label>
                                <input type="text" class="form-control"name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Phone</label>
                            <input type="text" class="form-control" id="inputEmail4" name="phone" placeholder="Phone">
                        </div>

                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" name="address" id="inputAddress">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">City</label>
                            <input type="text" class="form-control" name="city" id="inputAddress">
                        </div>
                        <div class="form-group">
                            <label for="">Payment By</label>
                            <ul class="list-unstyled">
                                <li><input type="radio" name="payment" value="stripe">Mastercard</li>
                                <li><input type="radio" name="payment" value="paypal">Paypal</li>
                                <li><input type="radio" name="payment" value="ideal">Mollie</li>
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>



            </div>
        </div>
    </div>       
</section>
@endsection
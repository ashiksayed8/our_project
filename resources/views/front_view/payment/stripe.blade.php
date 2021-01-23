@extends('layouts.app')
@section('content')

<style type="text/css">
	/**
	 * The CSS shown here will not be introduced in the Quickstart guide, but shows
	 * how you can use CSS to style your Element's container.
	 */
	.StripeElement {
	  box-sizing: border-box;

	  height: 40px;
	  width: 100%;

	  padding: 10px 12px;

	  border: 1px solid transparent;
	  border-radius: 4px;
	  background-color: white;

	  box-shadow: 0 1px 3px 0 #e6ebf1;
	  -webkit-transition: box-shadow 150ms ease;
	  transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
	  box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
	  border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
	  background-color: #fefde5 !important;
	}
</style>

<section>

  @php
     $settings=DB::table('settings')->first();
     $charge=$settings->shipping_charge; 
     $cart=Cart::content();
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
                            <span>{{ session::get('coupon')['coupon_name'] }}:${{session::get('coupon')['coupon_discount']   }}</span>                      
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
                        <h3>Payment</h3>
                    </div>
                    <div class="card-body">
                                        
                    <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                         @csrf
                        <div class="form-row">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                    
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        </div>


                            {{--   extra data --}}
                            <input type="hidden" name="shipping" value="{{ $charge }}">
                            <input type="hidden" name="vat" value="0">
                            <input type="hidden" name="total" value="{{ Cart::Subtotal()}}">
                              {{-- shipping details pass --}}
                          <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
                          <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
                          <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
                          <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
                          <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
                          <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">         
                        <button>Submit Payment</button>
                    </form>
                    </div>
                </div>



            </div>
        </div>
    </div>       
</section>

<script type="text/javascript">
	// Create a Stripe client.
var stripe = Stripe('pk_test_51IAfYoKCKrfkWzToyYqiA3Zkd4h6lwHHCxNLJkY1Wj8G2clYaeAlKsBIZQMDNg73RxOOt1pskctLw3n0K2hztXZr00dtw2Zttq');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection
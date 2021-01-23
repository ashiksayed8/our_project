@extends('layouts.app')
@section('content')

<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="">
                    <div class="card">
                      <div class="card-boy">
                        <img class="d-block w-100" src="{{ asset($product->product_image) }}" alt="First slide">
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-7">
               <p class="new-arrival text-center">New</p>
               <h2>{{ $product->product_name }}</h2> 
               <p>{{ $product->product_code }}</p>
               @if($product->discount_price == NULL)
               <p class="price">USD${{ $product->selling_price }}</p>
               @else 
               <p class="price">USD${{ $product->discount_price}}</p>
               @endif
               <b>Availability:</b> In Stock</>
               <p><b>Condition:</b> New</p>
               <p><b>Brand:</b>{{ $product->brand_name }}</p>
               {{-- <label>Quantity</label>
               <input type="text" value="1"> --}}
               <a href="{{ url('cart/product/add/'.$product->id) }}" type="button" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>
</section>

<!----------Product-description-------------->
<section class="product-description">
    <div class="container">
        <h6>Product Description</h6>
        <p>{!! $product->product_details !!}</p>
        <hr>
    </div>  
</section>
@endsection


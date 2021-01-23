@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>
 <div class="card">
    <div class="card-header">
        <h1 class="text-primary">Add Product</h1>
    </div>
    <div class="card-body d-block"></div>
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <div class="card card-body">
                        <img class="d-block w-100" src="{{ url($product->product_image) }}" alt="Product Image">
                    </div>      
                </div>
                <div class="col-md-4">
                   <h5>Product Name: {{ $product->product_name }}</h5> 
                   <p><b>Product Code: </b>{{ $product->product_code }}</p>
                   <p><b>Product Price: </b>{{ $product->selling_price }}</p>
                   <p><b>Discount:</b>{{ $product->discount_price }}</p>
                   <p><b>Category:</b> {{ $product->category_name }}</p>
                   <p><b>Subcategory:</b> {{$product->subcategory_name  }}</p>
                   <p><b>Brand:</b> {{$product->brand_name  }}</p>
                   <p><b>Color:</b> {{$product->product_color  }}</p>
                   <p><b>Quantity:</b> {{$product->product_quantity  }}</p>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-4">
                            <h6>Main Slider</h6>
                            @if($product->main_slider == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @else 
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <h6>Hot Deal</h6>
                            @if($product->hot_deal == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @else 
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <h6>Best Rate</h6>
                            @if($product->best_rated == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @else 
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </div>
                    </div>  
                    <div class="row mt-3">
                        <div class="col-4">
                            <h6>Trend</h6>
                            @if($product->trend == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @else 
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <h6>Mid Slider</h6>
                            @if($product->mid_slider == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @else 
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <h6>Hot New</h6>
                            @if($product->hot_new == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @else 
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <h6>Buy one get one</h6>
                            @if($product->buyone_getone == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @else 
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </div>
                    </div>                 
                 </div>
            </div>
        </div>
    </section>

<!----------Product-description-------------->
    <section class="jumbotron">
        <div class="container">
            <h6 class="text-warning">Product Description</h6>
            <p>{!! $product->product_details !!}</p>
        </div>  
    </section>
    </div>
@endsection

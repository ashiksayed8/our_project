@extends('layouts.app')
@section('content')
@include('layouts.menubar_category_and_main_slide')

@php
 $hot_new=DB::table('products')->where('status',1)->where('hot_new',1)->orderBy('id','desc')->limit(16)->get();
 $trend=DB::table('products')->where('status',1)->where('trend',1)->orderBy('id','desc')->limit(16)->get();
 $hot=DB::table('products')->where('status',1)->where('hot_deal',1)->orderBy('id','desc')->limit(16)->get();
 $best_rated=DB::table('products')->where('status',1)->where('best_rated',1)->orderBy('id','desc')->limit(16)->get();
 $mid_slider=DB::table('products')->where('status',1)->where('mid_slider',1)->orderBy('id','desc')->limit(16)->get();
 $buy_one_get_one=DB::table('products')->where('status',1)->where('buyone_getone',1)->orderBy('id','desc')->limit(3)->get();
@endphp

    
<!------------Featured categories---------->

<section class="featured-categories mt-5">
    <div class="container">
        <div class="title-box">
            <h5>Buy One Get One</h5>
        </div>
        <div class="row">
            @foreach($buy_one_get_one as $row)
            <div class="col-md-3">
                <div class="product-top">
                    <img src="{{ asset($row->product_image) }}" style="heigh:140px; width:180px;" alt="Product">
                    @if ($row->discount_price == NULL)
                    <div><span class="badge badge-primary" style="z-index: 2;">New</span></div>
                    @else 
                    @php
                     $discount_amount =  $row->selling_price - $row->discount_price;
                     $discount = ($discount_amount/ $row->selling_price)*100;
                    @endphp
                    <div><span class="badge badge-danger dispaly-2" style="z-index: 2;">{{ intVal($discount )}}%</span></div>
                    @endif
                   
                    <div class="overlay-right">
                        <a href={{ url('product/details/'.$row->id.'/'.$row->product_name) }} type="button" class="btn btn-secondary"title="Quick Shop">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a type="button" class="btn btn-secondary addwishlist" data-id="{{ $row->id }}" title="Add to Wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <a href="{{ url('add/cart/'.$row->id) }}" type="button" class="btn btn-secondary addcart" data-id="{{ $row->id}}" title="Add to Card">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-bottom">
                     <h3>{{ $row->product_name }}</h3>
                     @if($row->discount_price == NULL)
                     <h2 class="text-danger ">{{ $row->selling_price }}</h2> 
                     @else 
                     <h2><span class="text-danger">{{ $row->discount_price }}</span> <del>{{ $row->selling_price }}</del></h2>
                     @endif  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--------On New product--------->

<section class="on-new-product mt-5">
    <div class="container">
        <div class="title-box">
            <h2>New product</h2>
        </div>
        <div class="row">
            @foreach($hot_new as $row)
            <div class="col-md-3">
                <div class="product-top">
                    <img src="{{ asset($row->product_image) }}" style="heigh:140px; width:180px;" alt="Product">
                    @if ($row->discount_price == NULL)
                    <div><span class="badge badge-primary" style="z-index: 2;">New</span></div>
                    @else 
                    @php
                     $discount_amount =  $row->selling_price - $row->discount_price;
                     $discount = ($discount_amount/ $row->selling_price)*100;
                    @endphp
                    <div><span class="badge badge-danger dispaly-2" style="z-index: 2;">{{ intVal($discount )}}%</span></div>
                    @endif
                   
                    <div class="overlay-right">
                        <a type="button" class="btn btn-secondary"title="Quick Shop">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Card">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-bottom">
                     <h3>{{ $row->product_name }}</h3>
                     @if($row->discount_price == NULL)
                     <h2 class="text-danger ">{{ $row->selling_price }}</h2> 
                     @else 
                     <h2><span class="text-danger">{{ $row->discount_price }}</span> <del>{{ $row->selling_price }}</del></h2>
                     @endif  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!--------On Trend product--------->

<section class="on-tren-product mt-5">
    <div class="container">
        <div class="title-box">
            <h2>Trend product</h2>
        </div>
        <div class="row">
            @foreach($trend as $row)
            <div class="col-md-3">
                <div class="product-top">
                    <img src="{{ asset($row->product_image) }}" style="heigh:140px; width:180px;" alt="Product">
                    @if ($row->discount_price == NULL)
                    <div><span class="badge badge-primary" style="z-index: 2;">New</span></div>
                    @else 
                    @php
                     $discount_amount =  $row->selling_price - $row->discount_price;
                     $discount = ($discount_amount/ $row->selling_price)*100;
                    @endphp
                    <div><span class="badge badge-danger dispaly-2" style="z-index: 2;">{{ intVal($discount )}}%</span></div>
                    @endif
                    <div class="overlay-right">
                        <a type="button" class="btn btn-secondary"title="Quick Shop">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a type="button" class="btn btn-secondary addwishlist" data-id="{{ $row->id }}" title="Add to Wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Card">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-bottom">
                     <h3>{{ $row->product_name }}</h3>
                     @if($row->discount_price == NULL)
                     <h2 class="text-danger ">{{ $row->selling_price }}</h2> 
                     @else 
                     <h2><span class="text-danger">{{ $row->discount_price }}</span> <del>{{ $row->selling_price }}</del></h2>
                     @endif       
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!--------On Hot product--------->

<section class="on-hot-product mt-5">
    <div class="container">
        <div class="title-box">
            <h2>Hot product</h2>
        </div>
        <div class="row">
            @foreach($hot as $row)
            <div class="col-md-3">
                <div class="product-top">
                    <img src="{{ asset($row->product_image) }}" style="heigh:140px; width:180px;" alt="Product">
                    @if ($row->discount_price == NULL)
                    <div><span class="badge badge-primary" style="z-index: 2;">New</span></div>
                    @else 
                    @php
                     $discount_amount =  $row->selling_price - $row->discount_price;
                     $discount = ($discount_amount/ $row->selling_price)*100;
                    @endphp
                    <div><span class="badge badge-danger dispaly-2" style="z-index: 2;">{{ intVal($discount )}}%</span></div>
                    @endif
                    <div class="overlay-right">
                        <a type="button" class="btn btn-secondary"title="Quick Shop">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Card">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-bottom">
                     <h3>{{ $row->product_name }}</h3>
                     @if($row->discount_price == NULL)
                     <h2 class="text-danger ">{{ $row->selling_price }}</h2> 
                     @else 
                     <h2><span class="text-danger">{{ $row->discount_price }}</span> <del>{{ $row->selling_price }}</del></h2>
                     @endif       
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!--------On Mid product--------->

<section class="on-mid-product mt-5">
    <div class="container">
        <div class="title-box">
            <h2>Mid Slider</h2>
        </div>
        <div class="row">
            @foreach($mid_slider as $row)
            <div class="col-md-3">
                <div class="product-top">
                    <img src="{{ asset($row->product_image) }}" style="heigh:140px; width:180px;" alt="Product">
                    @if ($row->discount_price == NULL)
                    <div><span class="badge badge-primary" style="z-index: 2;">New</span></div>
                    @else 
                    @php
                     $discount_amount =  $row->selling_price - $row->discount_price;
                     $discount = ($discount_amount/ $row->selling_price)*100;
                    @endphp
                    <div><span class="badge badge-danger dispaly-2" style="z-index: 2;">{{ intVal($discount )}}%</span></div>
                    @endif
                   
                    <div class="overlay-right">
                        <a type="button" class="btn btn-secondary"title="Quick Shop">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Card">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-bottom">
                     <h3>{{ $row->product_name }}</h3>
                     @if($row->discount_price == NULL)
                     <h2 class="text-danger ">{{ $row->selling_price }}</h2> 
                     @else 
                     <h2><span class="text-danger">{{ $row->discount_price }}</span> <del>{{ $row->selling_price }}</del></h2>
                     @endif  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<!--------On Best product--------->

<section class="on-best-product mt-5">
    <div class="container">
        <div class="title-box">
            <h2>Best Rated</h2>
        </div>
        <div class="row">
            @foreach($best_rated as $row)
            <div class="col-md-3">
                <div class="product-top">
                    <img src="{{ asset($row->product_image) }}" style="heigh:140px; width:180px;" alt="Product">
                    @if ($row->discount_price == NULL)
                    <div><span class="badge badge-primary" style="z-index: 2;">New</span></div>
                    @else 
                    @php
                     $discount_amount =  $row->selling_price - $row->discount_price;
                     $discount = ($discount_amount/ $row->selling_price)*100;
                    @endphp
                    <div><span class="badge badge-danger dispaly-2" style="z-index: 2;">{{ intVal($discount )}}%</span></div>
                    @endif
                   
                    <div class="overlay-right">
                        <a type="button" class="btn btn-secondary"title="Quick Shop">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <a type="button" class="btn btn-secondary"title="Add to Card">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-bottom">
                     <h3>{{ $row->product_name }}</h3>
                     @if($row->discount_price == NULL)
                     <h2 class="text-danger ">{{ $row->selling_price }}</h2> 
                     @else 
                     <h2><span class="text-danger">{{ $row->discount_price }}</span> <del>{{ $row->selling_price }}</del></h2>
                     @endif  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>





<!------------Website features---------->

<section class="website-features">
    <div class="container">
        <div class="row">
            <div class="col-md-3 feature-box">
                <img src="img/logo.png" alt="">
                <div class="feature-text">
                    <p><b>100% Original items </b>are available at Company</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="img/logo.png" alt="">
                <div class="feature-text">
                    <p><b>100% Original items </b>are available at Company</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="img/logo.png" alt="">
                <div class="feature-text">
                    <p><b>100% Original items </b>are available at Company</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="img/logo.png" alt="">
                <div class="feature-text">
                    <p><b>100% Original items </b>are available at Company</p>
                </div>
            </div>
        </div>
    </div>
</section>


  {{-- Ajax========  --}}
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
  </script>
  
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

{{--   
<script type="text/javascript">
    $(document).ready(function() {
         $('.addcart').on('click', function(){
             var id = $(this).data('id');
             if(id) {             
                 $.ajax({
                     url:"{{ url('/add/cart/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                      const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                      })
                      if($.isEmptyObject(data.error)) {
                          Toast.fire({
                              type:'success',
                              title: data.success
                          })
                      }else{
                        Toast.fire({
                              type:'error',
                              title: data.error
                          })
                      }
                     },
                    
                 });
             } else {
                 alert('danger');
             }          
         });
     });

</script>  --}}


<script type="text/javascript">
    $(document).ready(function() {
         $('.addwishlist').on('click', function(){
             var id = $(this).data('id');
             if(id) {
                 $.ajax({
                     url: "{{  url('/add/wishlist/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                      const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                      })
                      if($.isEmptyObject(data.error)) {
                          Toast.fire({
                              type:'success',
                              title: data.success
                          })
                      }else{
                        Toast.fire({
                              type:'error',
                              title: data.error
                          })
                      }
                     },
                    
                 });
             } else {
                 alert('danger');
             }
             e.preventDefault();             
         });
     });

</script> 

@endsection


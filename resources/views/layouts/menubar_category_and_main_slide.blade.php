<section class="header">
    <div class="side-menu" id="side-menu">
        @php
         $category=DB::table('categories')->get();
        @endphp
        <ul>
            @foreach($category as $row)
            <li> {{ $row->category_name }} <i class="fa fa-angle-right"></i>
               <ul> 
                   @php
                     $subcategory=DB::table('subcategories')->where('category_id',$row->id)->get(); 
                   @endphp
                   @foreach($subcategory as $row)
                   <li><a href="">{{ $row->subcategory_name }}</a></li> 
                   @endforeach 
               </ul>
            </li>
            @endforeach
        </ul>
    </div>

    @php
    $slider=DB::table('products')->join('brands','products.brand_id','brands.id')->select('products.*','brands.brand_name')->where('products.main_slider',1)->orderBy('id','DESC')->limit(4)->get();
    @endphp
    <div class="slider">
        <div id="slider" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
                <li data-target="#slider" data-slide-to="3"></li>
             </ol>
            <div class="carousel-inner">
                @foreach ($slider as $row)
                <div class="carousel-item @if($loop->first) active @endif">
                    <div class="row">
                        <div class="col-6 mt-5 ml-5 text-center">
                            <h3>{{ $row->product_name }}</h3>
                            <div>
                                @if($row->discount_price == NULL)
                                <h4>${{ $row->selling_price }}</h4>
                                @else
                                <span class="text-danger">${{ $row->discount_price }}</span> <del>${{ $row->selling_price }}</del>
                                @endif
                            </div>
                            <div>
                                <h3>{{ $row->brand_name }}</h3>
                            </div>
                            <a class="btn btn-primary" href="">Shop now</a>
                        </div>
                        <div class="col-4">
                            <img class="d-block" src="{{ asset($row->product_image) }}" alt="product">
                        </div>
                    </div>
                </div>   
                @endforeach      
            </div>
        </div>
    </div>
</section>
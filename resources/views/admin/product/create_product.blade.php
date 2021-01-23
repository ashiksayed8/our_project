@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>
 <div class="card">
    <div class="card-header">
        <h1 class="text-primary">Add Product</h1>
    </div>
    <div class="card-body d-block">
        <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="product_name" class="form-control-label">Product Name: <span class="text-danger">*</span></label>
                    <input type="text" id="product_name" class="form-control" name="product_name">
                </div>
                <div class="form-group col-md-4">
                    <label for="product_code" class="form-control-label">Product Code: <span class="text-danger">*</span></label>
                    <input type="text" id="product_code" class="form-control" name="product_code">
                </div>
                <div class="form-group col-md-4">
                    <label for="product_quantity" class="form-control-label">Product Quantity: <span class="text-danger">*</span></label>
                    <input type="text" id="product_quantity" class="form-control" name="product_quantity">
                </div>
            </div>
            <div class="form-row mt-md-3">
                <div class="form-group col-md-4">
                    <label for="product_size" class="form-control-label">Product Size: <span class="text-danger">*</span></label>
                    <input type="text" id="product_size" class="form-control" name="product_size">
                </div>
                <div class="form-group col-md-4">
                    <label for="product_color" class="form-control-label">Product Color: <span class="text-danger">*</span></label>
                    <input type="text" id="product_color" class="form-control" name="product_color">
                </div>
                <div class="form-group col-md-4">
                    <label for="selling_price" class="form-control-label">Selling Price: <span class="text-danger">*</span></label>
                    <input type="text" id="selling_price" class="form-control" name="selling_price">
                </div>
            </div>
            <div class="form-row mt-md-3">
                <div class="form-group col-md-4">
                    <label for="product_category" class="form-control-label">Category: <span class="text-danger">*</span></label>
                    <select class="form-control" name="category_id" id="product_category">
                        <option label="Choose Category"></option>
                        @foreach($category as $row)
                        <option value="{{$row->id}}">{{$row->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="product_subcategory" class="form-control-label">Sub Category: <span class="text-danger">*</span></label>
                    <select class="form-control" name="subcategory_id" id="product_subcategory">
            
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="product_brand" class="form-control-label">Brand: <span class="text-danger">*</span></label>
                    <select class="form-control" name="brand_id" id="product_brand">
                        <option label="Choose Brand"></option>
                        @foreach($brand as $row)
                        <option value="{{$row->id}}">{{$row->brand_name}}</option>
                        @endforeach
                    </select>
                </div>              
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name= "main_slider" value="1" id="main_slider">
                            <label class="form-check-label"  for="main_slider">Main Slider</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name= "hot_deal" value="1" id="hot_deal">
                            <label class="form-check-label"  for="hot_deal">Hot Deal</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name= "best_rated" value="1" id="best_rated">
                            <label class="form-check-label"  for="best_rated">Best Rated</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name= "trend" value="1" id="trend">
                            <label class="form-check-label"  for="trend">Trend Product</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name= "mid_slider" value="1" id="mid_slider">
                            <label class="form-check-label"  for="mid_slider">Mid Slider</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name= "hot_new" value="1" id="hot_new">
                            <label class="form-check-label"  for="hot_new">Hot New</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name= "buyone_getone" value="1" id="buyone_getone">
                            <label class="form-check-label"  for="buyone_getone">By One Get One</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">                  
                <div class="col-md-12 mt-md-3">
                    <div class="form-group">
                        <label for="summernote" class="form-control-label">Product Details<span class="text-danger">*</span>
                        </label>
                        <textarea class='form-control' id="summernote" name= "product_details">
                         </textarea>
                    </div>
                </div>
            </div>
            <div class="row">                  
                <div class="col-md-6 mt-md-3">
                    <div class="form-group">
                        <label for="image_file" class="form-label">Image <span class='text-danger'>*</span></label>
                        <input class="form-control form-control-lg" id="image_file" type="file" onchange="readURL(this);" name="product_image"  />
                    </div>
                </div>
                <div class="col-md-6 mt-md-3">
                    <div class="">
                        <img src="#" id="image" alt="Product_image">
                    </div>
                </div>
            </div>
            <button  type="submit" class="btn btn-info mt-3 mb-5 btn-block btn-lg">Submite</button>
        </form> 
    </div>
  </div>
  


  <!-- Ajax======== -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
  </script>
  
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                           $.each(data, function(key, value){

                               $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                           });
  
                     },
                    
                 });
             } else {
                 alert('danger');
             }

         });
     });

</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function (e) {
               $('#image')
              .attr('src', e.target.result)
              .width(200)
              .height(150);
      };
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection

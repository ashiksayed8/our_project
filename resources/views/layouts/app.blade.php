<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
      <!---------BOOTSTRAP TABLE-------->
      <link rel="stylesheet" href="{{asset('public/admin_design/datatable/dataTables.bootstrap4.min.css')}}">
      <!--BOOTSTRAP SETUP-->
      <link rel="stylesheet" href="{{asset('public/admin_design/css/bootstrap.min.css')}}">
  
      <!---GOOGHLE MATERIAL ICONS SETUP---->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">

      <!-----fontawesome------>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

      <!-- CSS SETUP FOR TAGSINPUT -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
     
      <!--CSS SETUP-->
      <link rel="stylesheet" href="{{asset('public/user_design/css/style.css')}}">

       <!--SUMMERNOTE SETUP-->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

      <script src="https://js.stripe.com/v3/"></script>
    
</head>
<body>
    <div class="top-nav-bar">
        <div class="search-box">

            <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
            <a href="{{ url('/') }}"><img src="img/logo.png" alt="Logo" class="logo"></a>
            
            <input type="text" class="form-control search_input">
            <span class="input-group-text search_input_text"><i class="fa fa-search"></i></span>
        </div>

        <div class="menu-bar">
            <ul>
                @guest
                @else
                @php
                  $wishlist=DB::table('wishlists')->where('user_id',Auth::id())->get();  
                @endphp
                <li><a href="{{ route('user.wishlist') }}"><span class="fa fa-heart">{{ count($wishlist) }}</span> Wishlist</a></li>
                @endguest

                @if(Session::has('coupon'))
                   <li><a href="{{ route('show.cart') }}"><span class="fa fa-shopping-basket">{{ Cart::count() }}</span> Card ${{ session::get('coupon')['balance']  }}</a></li>
                @else 
                <li><a href="{{ route('show.cart') }}"><span class="fa fa-shopping-basket">{{ Cart::count() }}</span> Card {{ Cart::subtotal() }}</a></li>
                @endif
                

                @guest
                <li><a href="{{ route('register') }}">Sing Up</a></li>
                <li><a href="{{ route('login') }}">Log In</a></li>
                @else
                <li><a href="{{ route('home') }}">Profile</a></li>
                @endguest
            </ul>
        </div>
    </div>

    @yield('content')

<!----------Footer------------->
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h1>Useful Link</h1>
                    <p>Privacy Links</p>
                    <p>Terms of Use</p>
                    <p>Return Policy</p>
                    <p>Discount Coupons</p>
                </div>
                <div class="col-md-3">
                    <h1>Useful Link</h1>
                    <p>Privacy Links</p>
                    <p>Terms of Use</p>
                    <p>Return Policy</p>
                    <p>Discount Coupons</p>
                </div>
                <div class="col-md-3">
                    <h1>Follow Us You</h1>
                    <p><i class="fab fa-facebook-square"></i>
                        Facebook</p>
                    <p><i class="fab fa-youtube-square"></i>Youtube</p>
                    <p><i class="fab fa-linkedin"></i>LinkIn</p>
                    <p><i class="fab fa-twitter-square"></i>Twitter</p>
                </div>
                <div class="col-md-3 footer-image">
                    <h1>Download App</h1>
                    <img src="img/logo.png" alt="">
                </div>
            </div>
            <hr>
            <p class="copyright">Made With by <i class="fas fa-heart"></i> Easy Tutorials</p>
           
        </div>
    </section>
   
    
     <!--JS SETUP-->
    {{-- <script src="{{asset('public/admin_design/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/admin_design/js/jquery-3.5.1.slim.min.js')}}"></script>  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="{{asset('public/admin_design/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('public/admin_design/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin_design/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin_design/datatable/dataTables.bootstrap4.min.js')}}"></script>


    {{-- <script src="{{asset('public/admin_Design/js/scripts.js')}}"></script> --}}
    <script>
     $('#mytable').dataTable();
    </script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> 
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    <script>
        $('#summernote').summernote({
        tabsize: 2,
        height: 100,
        tooltip: false
        });
    </script>
     <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.c("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script> 
     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
</body>
</html>

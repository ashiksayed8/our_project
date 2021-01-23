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
      <link rel="stylesheet" href="{{asset('public/admin_design/css/style.css')}}">

       <!--SUMMERNOTE SETUP-->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    
</head>
<body>
      @guest
        @else
            
        <input type="checkbox" id="sidebar-toggle">
        <div class="sidebar">

            <div class="sidebar-header">
                <h3 class="brand">
                    <span class="ti-unlink"></span>
                    <span>AR SHOP</span>
                </h3> 
                <label for="sidebar-toggle" class="ti-menu-alt"></label>
            </div>

            <div class="sidebar-menu">
                
                <ul class="list-group">

                    <a href="" class="bg-secondary list-group-item list-group-item-action text-black-50">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="far fa-caret-square-down fa-fw mr-3"></span>
                            <span>Main Menu</span>
                        </div>
                    </a>

                    <a href="{{ url('admin/home') }}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fas fa-tachometer-alt fa-fw mr-3"></span>
                            <span>Dashboard</span>
                        </div>
                    </a>

                    <a href="#sub_sections1" data-toggle="collapse" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fas fa-clipboard-list fa-fw mr-3"></span>
                            <span>Category Section</span>
                            <span class="fas fa-angle-down ml-auto"></span>
                        </div>
                    </a>

                    <div id="sub_sections1" class=" collapse sidebar-submenu">
                        <a href="{{route('categories')}}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>Category</span>
                        </a>
                        <a href="{{route('subcategories')}}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>Sub category</span>
                        </a>
                    </div>
                         
                    <a href="{{route('brands')}}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fas fa-tachometer-alt fa-fw mr-3"></span>
                            <span>Brand</span>
                        </div>
                    </a>

                    <a href="{{route('coupons')}}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fas fa-tachometer-alt fa-fw mr-3"></span>
                            <span>Coupons</span>
                        </div>
                    </a>

                    <a href="#sub_sections2" data-toggle="collapse" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fas fa-clipboard-list fa-fw mr-3"></span>
                            <span>Product Section</span>
                            <span class="fas fa-angle-down ml-auto"></span>
                        </div>
                    </a>

                    <div id="sub_sections2" class=" collapse sidebar-submenu">
                        <a href="{{route('add.product')}}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>Add Product</span>
                        </a>
                        <a href="{{route('all.product')}}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>All product</span>
                        </a>
                    </div>

                    <a href="#sub_sections3" data-toggle="collapse" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fas fa-clipboard-list fa-fw mr-3"></span>
                            <span>Order Section</span>
                            <span class="fas fa-angle-down ml-auto"></span>
                        </div>
                    </a>

                    <div id="sub_sections3" class=" collapse sidebar-submenu">
                        <a href="{{ route('admin.neworder') }}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>New Pending Order</span>
                        </a>
                        <a href="{{ route('admin.accept.payment') }}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>Accept Payments</span>
                        </a>
                        <a href="{{ route('admin.progress.payment') }}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>Progress Delevery</span>
                        </a>
                        <a href="{{ route('admin.success.payment') }}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>Delevery Success</span>
                        </a>
                        <a href="{{ route('admin.cancel.order') }}" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="fas fa-caret-right fa-fw mr-3"></span>
                            <span>Cancel Order</span>
                        </a>
                    </div>


                    <a href="{{route('admin.seo')}}" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fas fa-tachometer-alt fa-fw mr-3"></span>
                            <span>Seo Setting</span>
                        </div>
                    </a>

                    
                </ul>
            </div>
        </div>

        <div class="main-content">

            <header class="d- flex justify-content-end">
                <div class="logout">
                    <a href="" class="text-white btn btn-danger" data-target="#sign-out" data-toggle="modal" ><i class="fas fa-sign-out-alt fa-lg mr-2"></i>Logout</a>
                </div>
            </header>

            
            <!--------Start modal------>
            <div class="modal fade" id="sign-out">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Want to leave</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    Press logout to leave
                    </div>
                    <div class="modal-footer">
                    <a class="btn btn-success" href="">Change Password</a>
                    <a class="btn btn-danger" href="{{route('admin.logout')}}">Logout</a>
                    </div>
                </div>
                </div>
            </div>
            <!-------End Modal---------->
                
        @endguest
      
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Optional JavaScript -->
   
    
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

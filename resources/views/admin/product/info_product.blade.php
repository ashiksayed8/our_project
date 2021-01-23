@extends('layouts.admin')
<?php 
$i=1;
?>
@section('content')
          <div style="margin-top:50px;"></div>  
          <div class="card bg-dark text-white">
            <div class="card-header bg-secondary text-white">
              <h1>Products Info</h1>
            </div>
          <div class="card-body d-block">
            <table class="table table-bordered table-striped table-hover" id="mytable">
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>SL NO</th>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($product as $row)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$row->product_code}}</td>
                  <td>{{$row->product_name}}</td>
                  <td><img src="{{ URL::to($row->product_image) }}" height="50px;" width="50px;" ></td>
                  <td>{{$row->category_name}}</td>
                  <td>{{$row->brand_name}}</td>
                  <td>{{$row->product_quantity}}</td>
                  <td>
                      @if($row->status == 1)
                       <a class="badge badge-pill badge-success">Active</a>
                      @else 
                       <a class="badge badge-pill badge-danger">Inactive</a>
                      @endif
                  </td>
                  
                  <td>
                    <a class="btn btn-warning" title="Edit" href="{{URL::to('edit/product/'.$row->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" id="delete" title="Delete" href="{{URL::to('delete/product/'.$row->id)}}"><i class="fa fa-trash"></i></a>
                    <a class="btn btn-primary" title="view" href="{{URL::to('view/product/'.$row->id)}}"><i class="fa fa-eye"></i></a>

                    @if($row->status == 1) 
                      <a class="btn btn-danger" title="Inactive" href="{{URL::to('inactive/product/'.$row->id)}}"><i class="fa fa-thumbs-down"></i></a>
                    @else 
                      <a class="btn btn-success" title="Active" href="{{URL::to('active/product/'.$row->id)}}"><i class="fa fa-thumbs-up"></i></a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection
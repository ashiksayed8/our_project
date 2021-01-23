@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>

      <div class="card">
      <div class="card-header">
        <h1>Data Table</h1>
        <div style="float:right;">
        <button class="btn btn-success mx-auto btn-lg" data-toggle="modal" data-target="#mymodal">Add Coupon</button>
        </div>
      </div>
      <div class="card-body d-block">
      <table class="table table-bordered table-striped table-hover" id="mytable">
        <thead>
          <tr>
            <th>Coupon Name</th>
            <th>Coupon Discount</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Coupon Name</th>
            <th>Coupon Discount</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($coupon as $row)
          <tr>
            <td>{{$row->coupon_name}}</td>
            <td>{{$row->coupon_discount}} %</td>
            <td>
              <a class="btn btn-warning" title="Edit" href="{{URL::to('edit/coupon/'.$row->id)}}"><i class="fa fa-edit"></i>
              </a>
               <a class="btn btn-danger" id="delete" title="Delete" href="{{URL::to('delete/coupon/'.$row->id)}}"><i class="fa fa-trash"></i>
              </a>
            </td>
          </tr>
          @endforeach
      </table>
      </div>
    </div>
 

<!---------MODAL---------->
<div class="modal" id="mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h3>Add Your Coupon</h3>
        <button class="close" data-dismiss="modal">&times;</button>
      </div>
          @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
      <form method="post" action="{{ route('store.coupon') }}">
      <div class="modal-body"> 
          @csrf
          <label for="couponlabel">Coupon Name</label>
          <input class="form-control" type="text" id="couponlabel"  name="coupon_name">
         <br>
          <label for="coupondislabel">Coupon Discount</label>
          <input class="form-control" type="text" id="coupondislabel"  name="coupon_discount">
        
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
        <button class="btn btn-info" type="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

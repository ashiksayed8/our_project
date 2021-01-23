@extends('layouts.admin')
<?php 
$i=1;
?>
@section('content')
          <div style="margin-top:50px;"></div>  
          <div class="card bg-dark text-white">
            <div class="card-header bg-secondary text-white">
              <h1>Order Pending</h1>
            </div>
          <div class="card-body d-block">
            <table class="table table-bordered table-striped table-hover" id="mytable">
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Payment Type</th>
                  <th>Transection</th>
                  <th>Subtotal</th>
                  <th>Shipping</th>
                  <th>Total</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
            
              <tbody>
                @foreach($order as $row)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$row->payment_type}}</td>
                  <td>{{$row->blnc_transection }}</td>
                  <td>{{$row->subtotal}}</td>
                  <td>{{$row->shipping}}</td>
                  <td>{{$row->total}}</td>
                  <td>{{$row->date}}</td>
                  <td>
                    @if ( $row->status == 0)
                        <p class="badge badge-warning">Pending</p>
                    @elseif( $row->status == 1)
                         <p class="badge badge-warning">PaymentAccept</p>
                    @elseif( $row->status == 2)
                         <p class="badge badge-warning">Progress</p>
                    @elseif( $row->status == 3)
                         <p class="badge badge-warning">Delevered</p>
                    @else 
                          <p class="badge badge-warning">Cancel</p>
                    @endif
                  </td>           
                  <td>
                    <a class="btn btn-warning" title="Show" href="{{URL::to('admin/view/order/'.$row->id)}}"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
   </div>

@endsection
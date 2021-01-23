@extends('layouts.app')

@section('content')
@php
    $order=DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
  $i = 1;
@endphp
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Profile Information</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-header">Order List</div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover" id="mytable">
                                        <thead>
                                          <tr>
                                            <th>Payment Type</th>
                                            <th>Transection</th>
                                            <th>Subtotal</th>
                                            <th>Shipping</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Status code</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                      
                                        <tbody>
                                          @foreach($order as $row)
                                          <tr>
                                            {{-- <td>{{ $i++ }}</td> --}}
                                            <td>{{$row->payment_type}}</td>
                                            <td>{{$row->blnc_transection }}</td>
                                            <td>{{$row->subtotal}}</td>
                                            <td>{{$row->shipping}}</td>
                                            <td>{{$row->total}}</td>
                                            <td>{{$row->date}}</td>
                                            <td>{{ $row->status_code }}</td>
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
                        <div class="col-2">
                            <div class="card">
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-header bg-secondary">
                                  <h3 class="card-title text-white ">{{ Auth::user()->name }}</h3>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('user.checkout') }}" class="btn  btn-primary btn-block">Check out</a>
                                  <a href="{{route('user.logout')}}" class="btn btn-danger btn-block">Log Out</a>
                                </div>
                              </div>
                        </div>

                    </div>
                </div>

           
            </div>
        </div>
    </div>
</div>
@endsection

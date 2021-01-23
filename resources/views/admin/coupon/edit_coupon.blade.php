@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>
 
           <div class="card">
      <div class="card-header">
        <h1>Update Coupon</h1>
      </div>
      <div class="card-body d-block">
          @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
      <form method="post" action="{{ url('update/coupon/'.$coupon->id) }}">
        @csrf
        <div>
          <label for="couponlabel">Coupon Name</label>
          <input class="form-control" type="text" id="couponlabel" value="{{ $coupon->coupon_name }}" name="coupon_name">
        </div>
        <div>
          <label for="coupondislabel">Coupon Discount</label>
          <input class="form-control" type="text" id="coupondislabel" value="{{ $coupon->coupon_discount }}" name="coupon_discount">
        </div>
        <div class="pt-3">
          <button class="btn btn-info" type="submit">Update</button>
        </div>
      </form>
      </div>
    </div>

@endsection

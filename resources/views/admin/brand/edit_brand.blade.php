@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>
           <div class="card">
      <div class="card-header">
        <h1>Update Brand</h1>
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
      <form method="post" action="{{ url('update/brand/'.$brand->id) }}" enctype="multipart/form-data">
        @csrf
         
          <div class="form-group">
            <label for="brandlabel">Brand Name</label>
            <input class="form-control" type="text" id="brandlabel" value="{{ $brand->brand_name }}" name="brand_name">
          </div>
          <div class="form-group">
            <label for="brandlabellogo">Brand logo</label>
            <input class="form-control" type="file" id="brandlabellogo" name="brand_logo">
          </div>  
          <div class="form-group">
            <label for="brandlabelold">Brand old logo</label>
            <img src="{{URL::to($brand->brand_logo)}}" style="height:70px;width:80px;">
            <input class="form-control" type="text" id="brandlabellold" value="{{ $brand->brand_logo }}" name="old_logo">
          </div>
        <div class="pt-3">
          <button class="btn btn-info" type="submit">Update</button>
        </div>
      </form>
      </div>
    </div>
@endsection

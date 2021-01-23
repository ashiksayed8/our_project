@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>
      <div class="card">
      <div class="card-header">
        <h1>Data Table</h1>
        <div style="float:right;">
        <button class="btn btn-success mx-auto btn-lg" data-toggle="modal" data-target="#mymodal">Add Brand</button>
        </div>
      </div>
      <div class="card-body d-block">
      <table class="table table-bordered table-striped table-hover" id="mytable">
        <thead>
          <tr>
            <th> Brand Name</th>
            <th> Brand Logo</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($brand as $row)
          <tr>
            <td>{{$row->brand_name}}</td>
            <td><img src="{{URL::to($row->brand_logo)}}"  height="70px;" width="80px;" ></td>
            <td class="text-center">
              <a class="btn btn-warning" title="Edit" href="{{URL::to('edit/brand/'.$row->id)}}"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger" id="delete" title="Delete" href="{{URL::to('delete/brand/'.$row->id)}}"><i class="fa fa-trash"></i></a>
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
        <h3>Add Your Brand</h3>
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
      <form method="post" action="{{ route('store.brand') }}" enctype="multipart/form-data">
      <div class="modal-body">
          @csrf
          <label for="brandlabel">Brand Name</label>
          <input class="form-control mb-2" type="text" id="brandlabel" name="brand_name">
          <input class="form-control" type="file" id="brandlabel" name="brand_logo">

      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
        <button class="btn btn-info" type="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

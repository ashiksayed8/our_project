@extends('layouts.admin')
<?php 
$i=1;
?>
@section('content')
          <div style="margin-top:50px;"></div>  
          <div class="card bg-dark text-white">
            <div class="card-header bg-secondary text-white">
              <h1>Category Details</h1>
              <div style="float:right;">
                <button class="btn btn-success mx-auto btn-lg" data-toggle="modal" data-target="#mymodal">Add Category</button>
              </div>
            </div>
          <div class="card-body d-block">
            <table class="table table-bordered table-striped table-hover" id="mytable">
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>SL NO</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($category as $row)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$row->category_name}}</td>
                  <td>
                    <a class="btn btn-warning" title="Edit" href="{{URL::to('edit/category/'.$row->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" id="delete" title="Delete" href="{{URL::to('delete/category/'.$row->id)}}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>


<!---------MODAL---------->
<div class="modal" id="mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h3>Add Your Catergory</h3>
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
      <form method="post" action="{{ route('store.category') }}">
      <div class="modal-body"> 
          @csrf
          <label for="categorylabel">Category Name</label>
          <input class="form-control" type="text" id="categorylabel" name="category_name">
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
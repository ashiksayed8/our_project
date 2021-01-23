@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>
    
      <div class="card">
      <div class="card-header">
        <h1>Data Table</h1>
        <div style="float:right;">
        <button class="btn btn-success mx-auto btn-lg" data-toggle="modal" data-target="#mymodal">Add Subcategory</button>
        </div>
      </div>
      <div class="card-body d-block">
      <table class="table table-bordered table-striped table-hover" id="mytable">
        <thead>
          <tr>
            <th>Category Name</th>
            <th>Subcategory Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($subcategory as $row)
          <tr>
            <td>{{$row->category_name}}</td>
            <td>{{$row->subcategory_name}}</td>
           
            <td>
              <a class="btn btn-warning" title="Edit" href="{{URL::to('edit/subcategory/'.$row->id)}}"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger" id="delete" title="Delete" href="{{URL::to('delete/subcategory/'.$row->id)}}"><i class="fa fa-trash"></i></a>
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
      <form method="post" action="{{ route('store.subcategory') }}">
      <div class="modal-body"> 
          @csrf
          <div class="form-group">
          <label for="subcategorylabel">Subcategory Name</label>
          <input class="form-control" type="text" id="subcategorylabel" name="subcategory_name">
          </div>
          <div class="form-group">
          <label for="categorylabel">Category Name</label>
          <select class="form-control" name="category_id">
            @foreach($category as $row)
            <option value="{{$row->id}}">{{ $row->category_name }}</option>
            @endforeach
          </select>
       <!--    <input class="form-control" type="text" id="categorylabel" name="category_id"> -->
          </div>
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

@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>
           <div class="card">
      <div class="card-header">
        <h1>Update Subcategory</h1>
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
      <form method="post" action="{{ url('update/subcategory/'.$subcategory->id) }}">
        @csrf
         <div class="form-group">
          <label for="subcategorylabel">Subcategory Name</label>
          <input class="form-control" type="text" id="subcategorylabel" value="{{$subcategory->subcategory_name}}" name="subcategory_name">
          </div>
          <div class="form-group">
          <label for="categorylabel">Category Name</label>
          <select class="form-control" name="category_id">
            @foreach($category as $row)
            <option value="{{$row->id}}"<?php if($row->id==$subcategory->category_id){
             echo "selected"; } ?> >{{ $row->category_name }}</option>
            @endforeach
          </select>
        <div class="pt-3">
          <button class="btn btn-info" type="submit">Update</button>
        </div>
      </form>
      </div>
    </div>
   
@endsection

@extends('layouts.admin')

@section('content')
      <div style="margin-top:50px;"></div>
          <div class="card">
            <div class="card-header">
              <h1>Update Category</h1>
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
                <form method="post" action="{{ url('update/category/'.$category->id) }}">
                  @csrf
                    <label for="categorylabel">Category Name</label>
                    <input class="form-control" type="text" id="categorylabel" value="{{ $category->category_name }}" name="category_name">
                    <div class="pt-3">
                      <button class="btn btn-info" type="submit">Update</button>
                    </div>
                </form>
            </div>
          </div>
@endsection

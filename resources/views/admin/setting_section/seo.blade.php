@extends('layouts.admin')

@section('content')
<div style="margin-top:50px;"></div>
 <div class="card">
    <div class="card-header">
        <h1 class="text-primary">Update Seo</h1>
    </div>
    <div class="card-body d-block">
        <form action="{{url('update/seo/'.$seo->id)}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="meta_title" class="form-control-label">Meta Title: <span class="text-danger">*</span></label>
                    <input type="text" id="meta_title" class="form-control" name="meta_title" value="{{ $seo->meta_title }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="meta_author" class="form-control-label">Meta Author: <span class="text-danger">*</span></label>
                    <input type="text" id="meta_author" class="form-control" name="meta_author" value="{{ $seo->meta_author }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="meta_tag" class="form-control-label">Meta Tag: <span class="text-danger">*</span></label>
                    <input type="text" id="meta_tag" class="form-control" name="meta_tag" value="{{$seo->meta_tag }}">
                </div>
            </div>
            <div class="form-row mt-md-3">
                <div class="form-group col-md-3">
                    <label for="meta_description" class="form-control-label">Meta Description: <span class="text-danger">*</span></label>
                    <input type="text" id="meta_description" class="form-control" name="meta_description" value="{{ $seo->meta_description }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="google_analytics" class="form-control-label">Google Analytics: <span class="text-danger">*</span></label>
                    <input type="text" id="google_analytics" class="form-control" name="google_analytics" value="{{ $seo->google_analytics }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="bing_analytics" class="form-control-label">Bing Analytics: <span class="text-danger">*</span></label>
                    <input type="text" id="bing_analytics" class="form-control" name="bing_analytics" value="{{ $seo->bing_analytics }}">
                </div>
            </div>
            <button  type="submit" class="btn btn-info mt-3 mb-5 btn-block btn-lg">Submite</button>
        </form> 
    </div>
  </div>

  @endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Social info</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('social.update',$social->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Social Desciption</label>
            <input type="text" class="form-control" value="{{$social->description}}" name="description"id="name" placeholder="Enter social Name">
          </div>
          <div class="form-group">
            <label for="description">Social Facebook</label>
            <input type="text" class="form-control" value="{{$social->facebook}}" name="facebook" id="description" placeholder="Enter social Description">
          </div>
          <div class="form-group">
            <label for="description">Social Instagram</label>
            <input type="text" class="form-control" value="{{$social->instagram}}" name="instagram" id="description" placeholder="Enter social Description">
          </div>
          <div class="form-group">
            <label for="description">Social Twitter</label>
            <input type="text" class="form-control" value="{{$social->twitter}}" name="twitter" id="description" placeholder="Enter social Description">
          </div>
          <div class="form-group">
            <label for="description">Social LinkedIn</label>
            <input type="text" class="form-control" value="{{$social->linkedin}}" name="linkedin" id="description" placeholder="Enter Member Description">
          </div>
          <div class="form-group">
            <label for="description">Social Skype</label>
            <input type="text" class="form-control" value="{{$social->skype}}" name="skype" id="description" placeholder="Enter Member Description">
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
</div>
@endsection
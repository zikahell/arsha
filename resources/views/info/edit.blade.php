@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Info</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('info.update',$info->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="question">Address</label>
            <input type="text" class="form-control" value="{{$info->address}}" name="address"id="name" placeholder="Enter Question">
          </div>
          <div class="form-group">
            <label for="answer">City</label>
            <input type="text" class="form-control" name="city" value="{{$info->city}}" id="name" placeholder="Enter Answer">
          </div>
          <div class="form-group">
            <label for="answer">Post Code</label>
            <input type="number" class="form-control" name="post_code" value="{{$info->post_code}}" id="name" placeholder="Enter Answer">
          </div>
          <div class="form-group">
            <label for="answer">Country</label>
            <input type="text" class="form-control" name="country" value="{{$info->country}}" id="name" placeholder="Enter Answer">
          </div>
          <div class="form-group">
            <label for="answer">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$info->phone}}" id="name" placeholder="Enter Answer">
          </div>
          <div class="form-group">
            <label for="answer">Email</label>
            <input type="text" class="form-control" name="email" value="{{$info->email}}" id="name" placeholder="Enter Answer">
          </div>
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
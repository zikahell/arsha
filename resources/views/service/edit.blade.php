@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Insert Service</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('service.update',$service->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Service Title</label>
            <input type="text" class="form-control" value="{{$service->title}}" name="title"id="name" placeholder="Enter Service Title">
          </div>
          <div class="form-group">
            <label for="description">Service Description</label>
            <input type="text" class="form-control" value="{{$service->description}}" name="description" id="description" placeholder="Enter Service Description">
          </div>
          <div class="form-group">
            <label for="description">Service Icon</label>
            <input type="text" class="form-control" value="{{$service->icon}}" name="icon" id="description" placeholder="Enter Service Icon">
          </div>
          
          
          
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
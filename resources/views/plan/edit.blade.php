@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Plan</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('plan.update',$plan->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Plan Name</label>
            <input type="text" class="form-control" name="name"id="name" value="{{$plan->name}}"placeholder="Enter Plan Name">
          </div>
          <div class="form-group">
            <label for="name">Plan Price</label>
            <input type="text" class="form-control" name="price"id="name" value="{{$plan->price}}"placeholder="Enter Plan Price">
          </div>
          <div class="form-group">
            <label for="name">Plan Duration</label>
            <input type="text" class="form-control" name="duration"id="name" value="{{$plan->duration}}"placeholder="Enter Plan Duration">
          </div>
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
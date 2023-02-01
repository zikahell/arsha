@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Insert Plan</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('plan.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Plan Name</label>
            <input type="text" class="form-control" name="name"id="name" placeholder="Enter Plan Name">
          </div>
          <div class="form-group">
            <label for="name">Plan Price</label>
            <input type="number" class="form-control" name="price"id="name" placeholder="Enter Plan Price">
          </div>
          <div class="form-group">
            <label for="name">Plan Duration</label>
            <input type="text" class="form-control" name="duration"id="name" placeholder="Enter Plan Duration">
          </div>
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
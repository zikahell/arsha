@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Call To Action Title</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('cta_title.update',$title->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="title">Call to Action Title</label>
            <input type="text" class="form-control" name="title"id="name" value="{{$title->title}}"placeholder="Enter Category Name">
          </div>
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
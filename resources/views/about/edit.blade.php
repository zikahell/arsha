@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Insert About Content</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('about.update',$content->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Content Title</label>
            <input type="text" class="form-control" value="{{$content->title}}" name="title"id="name" placeholder="Enter Content Title">
          </div>
          <div class="form-group">
            <label for="name">Content Line 1</label>
            <input type="text" class="form-control" value="{{$content->line1}}" name="line1"id="name" placeholder="Enter Content Line 1 ">
          </div>
          <div class="form-group">
            <label for="name">Content Line 2</label>
            <input type="text" class="form-control" value="{{$content->line2}}" name="line2"id="name" placeholder="Enter Content Line 2 ">
          </div>
          <div class="form-group">
            <label for="name">Content Line 3</label>
            <input type="text" class="form-control" value="{{$content->line3}}" name="line3"id="name" placeholder="Enter Content Line 3 ">
          </div>
          <div class="form-group">
            <label for="description">Content Description</label>
            <input type="text" class="form-control" value="{{$content->description}}" name="description" id="description" placeholder="Enter Content Description">
          </div>
          
          
          
          
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
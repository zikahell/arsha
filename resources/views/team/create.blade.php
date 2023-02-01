@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Insert Member</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('teams.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Member Name</label>
            <input type="text" class="form-control" name="name"id="name" placeholder="Enter Member Name">
          </div>
          <div class="form-group">
            <label for="job">Member Job</label>
            <input type="text" class="form-control" name="job" id="job" placeholder="Enter Member Job">
          </div>
          <div class="form-group">
            <label for="description">Member Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Enter Member Description">
          </div>
          <div class="form-group">
            <label for="description">Member Facebook</label>
            <input type="text" class="form-control" name="facebook" id="description" placeholder="Enter Facebook link">
          </div>
          <div class="form-group">
            <label for="description">Member Instagram</label>
            <input type="text" class="form-control" name="instagram" id="description" placeholder="Enter Instagram link">
          </div>
          <div class="form-group">
            <label for="description">Member Twitter</label>
            <input type="text" class="form-control" name="twitter" id="description" placeholder="Enter Twitter link">
          </div>
          <div class="form-group">
            <label for="description">Member LinkedIn</label>
            <input type="text" class="form-control" name="linkedin" id="description" placeholder="Enter LinkedIn link">
          </div>
          
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="exampleInputFile" value="">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
          </div>
          
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
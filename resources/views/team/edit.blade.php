@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Member</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('teams.update',$member->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Member Name</label>
            <input type="text" class="form-control" value="{{$member->name}}" name="name"id="name" placeholder="Enter Member Name">
          </div>
          <div class="form-group">
            <label for="job">Member Job</label>
            <input type="text" class="form-control" value="{{$member->job}}" name="job" id="job" placeholder="Enter Member Job">
          </div>
          <div class="form-group">
            <label for="description">Member Description</label>
            <input type="text" class="form-control" value="{{$member->description}}" name="description" id="description" placeholder="Enter Member Description">
          </div>
          <div class="form-group">
            <label for="description">Member Facebook</label>
            <input type="text" class="form-control" value="{{$member->facebook}}" name="facebook" id="description" placeholder="Enter Member Description">
          </div>
          <div class="form-group">
            <label for="description">Member Instagram</label>
            <input type="text" class="form-control" value="{{$member->intagram}}" name="instagram" id="description" placeholder="Enter Member Description">
          </div>
          <div class="form-group">
            <label for="description">Member Twitter</label>
            <input type="text" class="form-control" value="{{$member->twitter}}" name="twitter" id="description" placeholder="Enter Member Description">
          </div>
          <div class="form-group">
            <label for="description">Member LinkedIn</label>
            <input type="text" class="form-control" value="{{$member->linkedin}}" name="linkedin" id="description" placeholder="Enter Member Description">
          </div>
          
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
            <img src="{{asset('front/team,upload/'.$member->image)}}" width="70px" height="70px" alt="">
          </div>
          
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
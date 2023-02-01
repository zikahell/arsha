@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Skill Title</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('skill.update',$skill->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="title">Skill Name</label>
            <input type="text" class="form-control" name="name"id="name" value="{{$skill->name}}"placeholder="Enter Skill Name">
          </div>
          <div class="form-group">
            <label for="description">Skill Percent</label>
            <input type="number" class="form-control" name="percent"id="name" value="{{$skill->percent}}"placeholder="Enter Skill Percent">
          </div>
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
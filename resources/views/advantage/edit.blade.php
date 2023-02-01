@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Advantage</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('advantage.update', $advantages->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Advantage</label>
            <input type="text" class="form-control" value="{{$advantages->advantage}}" name="advantage"id="name" placeholder="Enter Product Name">
          </div>
          
          <div class="form-group">
            <label for="plan_id">Select Plan</label>
            <select name="plan_id" id="plan_id" class="form-control">
              @foreach ($plans as  $plan)
              <option value="{{$plan->id}}">{{$plan->name}}</option>
              @endforeach
            </select>
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
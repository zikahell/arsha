@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        
    </div>

    

    <!-- Content Row -->
    <div class="row-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->name}}</td>
            <td>
              <form action="{{route('category.edit',$category->id)}}" method="POST">
                @csrf
                @method('GET')
                <input type="submit" class="btn btn-primary " value="Edit">
              </form>
            </td>
            <td>
              <form action="{{route('category.destroy',$category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger " value="Delete">
              </form>
            </td>
          
          </tr>
          @endforeach
  
        </tbody>
      </table>
        


    

</div>
@endsection
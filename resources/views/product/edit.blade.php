@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('product.update', $products->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" value="{{$products->name}}" name="name"id="name" placeholder="Enter Product Name">
          </div>
          <div class="form-group">
            <label for="description">Product Description</label>
            <input type="text" class="form-control" value="{{$products->description}}" name="description" id="description" placeholder="Enter Product Description">
          </div>
          <div class="form-group">
            <label for="client">Product Client</label>
            <input type="text" class="form-control" name="client" value="{{$products->client}}"id="client" placeholder="Enter Product Client">
          </div>
          <div class="form-group">
            <label for="category_id">Select Category</label>
            <select name="category_id" id="category_id" class="form-control">
              @foreach ($categories as  $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          
          
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
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
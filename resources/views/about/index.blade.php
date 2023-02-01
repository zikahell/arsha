@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Messages</h1>
        
    </div>


    <!-- Content Row -->
    <div class="row-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Title</th>
            <th>Line1</th>
            <th>Line2</th>
            <th>Line3</th>
            <th>Description</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>{{$content->title}}</td>
            <td>{{$content->line1}}</td>
            <td>{{$content->line2}}</td>
            <td>{{$content->line3}}</td>
            <td>{{$content->description}}</td>
            <td>
              <form action="{{route('about.edit',$content->id)}}" method="POST">
                @csrf
                @method('GET')
                <input type="submit" class="btn btn-primary " value="Edit">
              </form>
            </td>
          </tr>
          
  
        </tbody>
      </table>
        


    

</div>
@endsection
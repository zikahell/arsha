@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Info</h1>
        
    </div>

    

    <!-- Content Row -->
    <div class="row-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Address</th>
            <th>City</th>
            <th>Post Code</th>
            <th>Country</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($infos as $info)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$info->address}}</td>
            <td>{{$info->city}}</td>
            <td>{{$info->post_code}}</td>
            <td>{{$info->country}}</td>
            <td>{{$info->phone}}</td>
            <td>{{$info->email}}</td>
            <td>
              <form action="{{route('info.edit',$info->id)}}" method="POST">
                @csrf
                @method('GET')
                <input type="submit" class="btn btn-primary " value="Edit">
              </form>
            </td>
            
          
          </tr>
          @endforeach
  
        </tbody>
      </table>
        


    

</div>
@endsection
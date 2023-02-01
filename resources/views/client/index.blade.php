@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Clients</h1>
        
    </div>

    

    <!-- Content Row -->
    <div class="row-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Image Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach($clients as $client)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td><img src="{{asset('front/client.upload/'.$client->image)}}" height="70" width="70" alt=""></td>
            <td>
              <form action="{{route('admin.client.delete',$client->id)}}" method="POST">
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
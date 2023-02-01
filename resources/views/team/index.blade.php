@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Team</h1>
        
    </div>

    

    <!-- Content Row -->
    <div class="row-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Job</th>
            <th>Description</th>
            <th>Image</th>
            <th>Facebook</th>
            <th>Instagram</th>
            <th>Twitter</th>
            <th>LinkedIn</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($members as $member)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$member->name}}</td>
            <td>{{$member->job}}</td>
            <td>{{$member->description}}</td>
            <td><img src="{{asset('front/team,upload/'.$member->image)}}" height="70" width="70" alt=""></td>
            <td>{{$member->facebook}}</td>
            <td>{{$member->instagram}}</td>
            <td>{{$member->twitter}}</td>
            <td>{{$member->linkedin}}</td>
            <td>
              <form action="{{route('teams.edit',$member->id)}}" method="POST">
                @csrf
                @method('GET')
                <input type="submit" class="btn btn-primary " value="Edit">
              </form>
            </td>
            <td>
              <form action="{{route('teams.destroy',$member->id)}}" method="POST">
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
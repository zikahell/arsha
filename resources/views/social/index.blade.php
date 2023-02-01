@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Social Info</h1>
        
    </div>

    

    <!-- Content Row -->
    <div class="row-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Description</th>
            <th>Facebook</th>
            <th>Instagram</th>
            <th>Twitter</th>
            <th>LinkedIn</th>
            <th>Skype</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($socials as $social)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$social->description}}</td>
            <td>{{$social->facebook}}</td>
            <td>{{$social->instagram}}</td>
            <td>{{$social->twitter}}</td>
            <td>{{$social->linkedin}}</td>
            <td>{{$social->skype}}</td>
            <td>
              <form action="{{route('social.edit',$social->id)}}" method="POST">
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
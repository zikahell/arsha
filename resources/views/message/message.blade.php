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
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Content</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($messages as $message)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$message->name}}</td>
            <td>{{$message->email}}</td>
            <td>{{$message->subject}}</td>
            <td>{{$message->content}}</td>
            <td>
              <form action="{{route('admin.messages.delete',$message->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger " value="Delete">
              </form>
            </td>
          
          </tr>
          @endforeach
  
        </tbody>
      </table>
      {{$messages->links()}}


    

</div>
@endsection
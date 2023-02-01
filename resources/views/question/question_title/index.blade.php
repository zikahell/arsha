@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Question Title</h1>
        
    </div>

    

    <!-- Content Row -->
    <div class="row-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Question Title</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($titles as $title)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$title->title}}</td>
            <td>
              <form action="{{route('question_title.edit',$title->id)}}" method="POST">
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
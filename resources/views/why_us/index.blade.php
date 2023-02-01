@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Why Us Questions</h1>
        
    </div>

    

    <!-- Content Row -->
    <div class="row-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($whies as $why)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$why->question}}</td>
            <td>{{$why->answer}}</td>
            <td>
              <form action="{{route('why.edit',$why->id)}}" method="POST">
                @csrf
                @method('GET')
                <input type="submit" class="btn btn-primary " value="Edit">
              </form>
            </td>
            <td>
              <form action="{{route('why.destroy',$why->id)}}" method="POST">
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
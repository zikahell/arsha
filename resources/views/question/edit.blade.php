@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Question</h1>
        
    </div>
    <!-- Content Row -->
    <div class="row-12">
      <form action="{{route('question.update',$question->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="question">Question</label>
            <input type="text" class="form-control" value="{{$question->question}}" name="question"id="name" placeholder="Enter Question">
          </div>
          <div class="form-group">
            <label for="answer">Answer</label>
            <input type="text" class="form-control" name="answer" value="{{$question->answer}}" id="name" placeholder="Enter Answer">
          </div>
    
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

        


    

</div>
@endsection
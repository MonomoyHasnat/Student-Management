@extends('layout')
@section('content')
 
<div class="card mt-3">
  <div class="card-header">Batch</div>
  <div class="card-body">
      
      <form action="{{ url('batches/' .$batches->id) }}" method="post">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$batches->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$batches->name}}" class="form-control"></br>
        <label>Course</label></br>
        <input type="text" name="course_id" id="course_id" value="{{$batches->course->name}}" class="form-control"></br>
        <label>Start Date</label></br>
        <input type="date" name="start_date" id="start_date" value="{{$batches->start_date}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection
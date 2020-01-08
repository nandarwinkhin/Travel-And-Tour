@extends('layout.master')
@section('title','Create Trip Plan')
@section('content')

<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Create A Trip Plan</div>
<div class="panel-body">

<br>

    <!-- <h1>Create Post</h1> -->

  <form method="post"enctype="multipart/form-data">
    @foreach($errors->all() as $error)
      <p class="alert alert-danger">{{$error}}</p>
    @endforeach

  <h3>{{Auth::user()->name}}</h3>

  <input type="text" class="form-control" id="trip_title" name="trip_title" placeholder="Trip title">
  <input type="text" class="form-control" id="cost" name="cost" placeholder="Total cost">
  <input type="date" class="form-control" id="trip_start_date" name="trip_start_date" placeholder="When will your trip start?">
  <textarea  class="form-control" id="description" name="description" cols="40" rows="5" placeholder="About the trip"></textarea>


      {{ csrf_field() }}

      <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="uploadFile" name="ImageForTrip[]" multiple/> 
            <label class="custom-file-label" for="customFile">Upload image</label>
        </div>
    </div>
    <br/>
    <div id="image_preview"></div>
    
      <button type="submit" class="btn btn-success">Create Trip</button>

  </form>



  

  

</div>
</div>
</div>
</div>
</div>
</div>

@endsection
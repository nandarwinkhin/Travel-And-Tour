@extends('layout.master')
@section('title','Create Post')

@section('content')
<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<div class="container">
<div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<!-- <div class="panel-heading">Create Post</div> -->
<div class="panel-body">

<br>

    <!-- <h1>Create Post</h1> -->
<!-- //action="{{ route('images.upload') }}" -->
  <form method="post"  enctype="multipart/form-data">
  <h3>{{Auth::user()->name}}</h3>

  <textarea  class="form-control" id="description" name="description" cols="40" rows="5" placeholder="Share your travel experience..."></textarea>

      {{ csrf_field() }}

      <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="uploadFile" name="ImageForPost[]" multiple/> 
            <label class="custom-file-label" for="customFile">Upload image</label>
        </div>
    </div>
  <br/>
    <div id="image_preview"></div>
    
      <button type="submit" class="btn btn-success">Post</button>

  </form>



  

  

</div>
</div>
</div>
</div>
</div>
</div>
@endsection
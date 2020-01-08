@extends('layout.master')
@section('title','Comments')

@section('content')

<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<form class="form-horizontal" role="form" method="POST">
{{ csrf_field() }}
@foreach($errors->all() as $error)
      <p class="alert alert-danger">{{$error}}</p>
@endforeach
<div class="form-row">
    <div class="col-md-8">
        <input id="description" type="text" class="form-control" name="description" placeholder="Comment" required>
    </div>
    <button type="submit" class="btn btn-success">
        Send
    </button>
</div>
</form>
</div>



        @foreach($comments as $comment)
        <div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
            @php($user=App\User::where('id','=',$comment->user_id)->get()->first())
            <div class="form-row">
                <img src="http://localhost/TravelAndTour/public/uploades/{{$user->photo}}" width='80' height='80' style='border-radius: 50%;'> 
                <h3 style='margin-top:15px;margin-left:10px;'>{{$user->name}}</h3>
            </div>
            <small><p style='margin-left: 80px;'>{{$comment->created_at}}</p></small>
            <p style='margin: 20px;font-size:20px'>{{$comment->description}}</p>
            </div>
        @endforeach


@endsection
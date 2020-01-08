@extends('layout.master')
@section('title','Profile')

@section('content')
<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
        <div class="form-row">
            <img src="http://localhost/TravelAndTour/public/uploades/{{$user->photo}}" width='80' height='80' style='border-radius: 50%;'> 
            <h3 style='margin-top:15px;margin-left:10px;'>{{$user->name}}</h3>
        </div>
        <br>
    <h4 style="margin-left:80px;">Email - {{$user->email}}</h4>
    <h4 style="margin-left:80px;">Phone - {{$user->phone}}</h4>
    <br>

</div>


@php($posts=App\Post::where('user_id','=',$user->id)->get())
@php($trips=App\TripPlan::where('user_id','=',$user->id)->get())


@foreach($posts as $post)
    <div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">

        <div class="form-row"><img src="http://localhost/TravelAndTour/public/uploades/{{$user->photo}}" width='80' height='80' style='border-radius: 50%;'> 
        <h3 style='margin-top:15px;margin-left:10px;'>{{$user->name}}</h3>
    </div>
        <small><p style='margin-left: 80px;'>{{$post->created_at}}</p></small>
        <p style='margin: 20px;font-size:20px'>{{$post->description}}</p>


        @php($filelocations=unserialize($post->photo))
        <div class="form-row">
            @foreach($filelocations as $location)
                <img src="http://localhost/TravelAndTour/public/uploades/{{$location}}" width='45%' height='400' style='margin:16px;'>
            @endforeach
        </div>
        <div class="form-row">
            
            <a href="{{ url('/comments/' . $post->id . '/1') }}" class="btn btn-success" style="margin:8px;">Comment</a>
        </div>
    </div>
    @endforeach


@foreach($trips as $trip)
    <div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
    
        <div class="form-row"><img src="http://localhost/TravelAndTour/public/uploades/{{$user->photo}}" width='80' height='80' style='border-radius: 50%;'> 
        <h3 style='margin-top:15px;margin-left:10px;'>{{$user->name}}</h3></div>
    
        <small><p style='margin-left: 80px;'>{{$trip->created_at}}</p></small>
        <ul>
            <li><b>Trip title :</b> {{$trip->trip_title}}</li>
            <li><b>cost :</b> {{$trip->cost}}</li>
            <li><b>Trip Start Date :</b> {{$trip->trip_start_date}}</li>
        </ul>
        <p style='margin: 20px;font-size:20px'>{{$trip->description}}</p>


        @php($filelocations=unserialize($trip->photo))
        <div class="form-row">
            @foreach($filelocations as $location)
                <img src="http://localhost/TravelAndTour/public/uploades/{{$location}}" width='45%' height='400' style='margin:16px;'>
            @endforeach
        </div>
        <div class="form-row">
        
            <a href="{{ url('/booking/' . $trip->id . '/trip') }}" class="btn btn-success" style="margin:8px;">Book this trip</a>
            <a href="{{ url('/comments/' . $trip->id . '/2') }}" class="btn btn-success" style="margin:8px;">Comment</a>
        </div>
    </div>
    @endforeach
</div>

@endsection
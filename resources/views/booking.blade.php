@extends('layout.master')
@section('title','Booking')

@section('content')

<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<form class="form-horizontal" role="form" method="POST">
{{ csrf_field() }}
    <div class="form-row">
        @php($user=App\User::where('id','=',$trip->user_id)->get()->first())
        <img src="http://localhost/TravelAndTour/public/uploades/{{$user->photo}}" width='80' height='80' style='border-radius: 50%;'> 
        <h3 style='margin-top:15px;margin-left:10px;'>{{$user->name}}</h3>
    </div>
        <small><p style='margin-left: 40px;'>{{$trip->created_at}}</p></small>
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
        <button type="submit" class="btn btn-success">
                                    Book this trip
                                </button>
        </form>
        
    </div>

@endsection
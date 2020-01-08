@extends('layout.master')
@section('title','Booking List')

@section('content')
<table border="1" style="margin:20px;">
    <tr>
        <th>Trip</th>
        <th>Customer's name</th>
        <th>Customer's phone number</th>
        <th>Customer's email</th>
        <!-- <th>Accept</th> -->
    </tr>
    @foreach($booklist as $book)
        @php($user=App\User::where('id','=',$book->user_id)->get()->first())
        @php($trip=App\TripPlan::where('id','=',$book->trip_id)->get()->first())

        @if($trip!=null)
        <tr>
            <td>{{$trip->trip_title}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td> 
        </tr>
        @endif
    @endforeach
</table>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\TripPlan;
use App\User;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $trip=TripPlan::where('id','=',$id)->get()->first();
        return view('booking')->with('trip',$trip);
    }
    public function bookTrip($id){
        Booking::create([
            'user_id'=>\Auth::user()->id,
            'trip_id'=>$id,
            'purchased_or_not'=>0,
        ]);
        
        return redirect('/welcome');
    }
    public function bookingList(){
        $trips=TripPlan::where('user_id','=',\Auth::user()->id)->get();
        $booklist=Booking::all();
        return view('booking_list')->with(array('trips'=>$trips,'booklist'=>$booklist));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //API
    public function createBooking(Request $request){
        $booking = Booking::create($request->all());
        return response()->json($booking);
    }

    public function selectBooking(){
        $bookings  = Booking::all()->sortBy('created_at');
        $response["bookings"] = $bookings;
        return response()->json($response);
    }

    public function updateBooking(Request $request, $id){
        $booking  = Booking::where('id',$id)->get();
           $booking->user_id = $request->input('user_id');
           $booking->trip_id = $request->input('trip_id');
           $booking->purchased_or_not = $request->input('purchased_or_not');
           $booking->save();
           $response["booking"] = $booking;
        return response()->json($response);
    }  

    public function deleteBooking($id){
        $booking=Booking::where('id',$id)->delete();
        return response()->json('Removed successfully.');
    }
}

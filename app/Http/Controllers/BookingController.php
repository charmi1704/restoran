<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_arr=booking::all();
        return view('admin.manage_booking',["booking_arr"=>$booking_arr]);
    }
    public function booking()
    {
        return view('website.booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|alpha:ascii',
            'email' => 'required',
            'date' => 'required',
            'people' => 'required',
            'request' => 'required'
        ]);

        $data = new booking;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->people = $request->people;
        $data->request = $request->request;
        $data->save();
        Alert::success('Success Title', 'Booking Success');
        return redirect('/booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        //
    }
}

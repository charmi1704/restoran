<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_arr=contact::all();
        return view('admin.manage_contact',["contact_arr"=>$contact_arr]);
    }
    public function contact()
    {
        return view('website.contact');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // add validation rules
        $validated = $request->validate([
            'name' => 'required|alpha:ascii',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        $data=new contact;
        $data->name=$request->name;  //$_REQUEST['name'];
        $data->email=$request->email;
        $data->comment=$request->comment;
        $data->save();
        Alert::success('Success Title', 'Success Message');
        return redirect('/contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.manage_contact');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=contact::find($id);
		$data->delete();
        Alert::success('Success Delete', 'Contact Deleted Success');
		return redirect('/manage_contact');
    }
}

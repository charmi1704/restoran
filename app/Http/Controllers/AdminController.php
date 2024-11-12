<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_login()
    {
        return view('admin.alogin');
    }

    public function adminlogin_auth(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = admin::where("email", $request->email)->first(); // single data first()     // ->get(); // arr
        if ($data) {
            if (Hash::check($request->password, $data->password)) {

                session()->put('ses_adminname', $data->name);
                session()->put('ses_adminid', $data->id);
                Alert::success('Success', 'Login Success');
                return redirect('/amain');
            } else {
                Alert::error('Failed', 'Login Failed due to wrong Password');
                return redirect('/admin_login');
            }
        }
         else {
            Alert::error('Failed', 'Login Failed due to wrong Email');
            return redirect('/admin_login');
        }
    }

    function admin_logout()
    {

        session()->pull('ses_adminid');
        session()->pull('ses_adminname');
        Alert::success('Congrats', 'You\'ve Successfully Logout');
        return redirect('/admin_login');
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_arr=service::all();
        return view('admin.manage_service',["service_arr"=>$service_arr]);
    }
    public function service()
    {
        return view('website.service');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_service');
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
            'img' => 'required|mimes:jpg,jpeg,png,gif',
            'description' => 'required'
        ]); 

       $data=new service;
       $data->name=$request->name;

       // image upload
       $file=$request->file('img');		
       $filename=time().'_img.'.$file->getClientOriginalExtension(); // 656676576_img.jpg
       $file->move('admin/assets/img/service/',$filename);  // use move for move image in public/images
    
       $data->img=$filename; // name store in db
       $data->description=$request->description;
       $data->save();
       Alert::success('Success Title', 'Service Add Success');
       return redirect('/add_service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.manage_service');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=service::find($id);
        $img=$data->img;
        unlink('admin/assets/img/service/'.$img);
		$data->delete();
        Alert::success('Success Delete', 'Service Deleted Success');
		return redirect('/manage_service');
    }
}

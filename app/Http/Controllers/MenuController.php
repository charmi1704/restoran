<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_arr=menu::all();
        return view('admin.manage_menu',["menu_arr"=>$menu_arr]);
    }
    public function menu()
    {
        $menu_arr=menu::all();
        return view('website.menu',["menu_arr"=>$menu_arr]);
        // return view('website.menu');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_menu');
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
            'name' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png,gif',
            'price' => 'required',
            'description' => 'required'
        ]); 

       $data=new menu;
       $data->name=$request->name;

       // image upload
       $file=$request->file('img');		
       $filename=time().'_img.'.$file->getClientOriginalExtension(); // 656676576_img.jpg
       $file->move('admin/assets/img/menu/',$filename);  // use move for move image in public/images
    
       $data->img=$filename; // name store in db
       $data->price=$request->price;
       $data->description=$request->description;
       $data->save();
       Alert::success('Success Title', 'Menu Add Success');
       return redirect('/add_menu');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=menu::find($id);
        $img=$data->img;
        unlink('admin/assets/img/menu/'.$img);
		$data->delete();
        Alert::success('Success Delete', 'Menu Deleted Success');
		return redirect('/manage_menu');
    }
}

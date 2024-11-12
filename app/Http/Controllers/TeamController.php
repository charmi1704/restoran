<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team_arr=team::all();
        return view('admin.manage_team',["team_arr"=>$team_arr]);
    }
    public function team()
    {
        $team_arr=team::all();
        return view('website.team',["team_arr"=>$team_arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_team');
        
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
            'designation' => 'required'
        ]); 

       $data=new team;
       $data->name=$request->name;

       // image upload
       $file=$request->file('img');		
       $filename=time().'_img.'.$file->getClientOriginalExtension(); // 656676576_img.jpg
       $file->move('admin/assets/img/team/',$filename);  // use move for move image in public/images
    
       $data->img=$filename; // name store in db
       $data->designation=$request->designation;
       $data->save();
       Alert::success('Success Title', 'Team Add Success');
       return redirect('/add_team');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.manage_team');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=team::find($id);
        $img=$data->img;
        unlink('admin/assets/img/team/'.$img);
		$data->delete();
        Alert::success('Success Delete', 'Team Deleted Success');
		return redirect('/manage_team');
    }
}

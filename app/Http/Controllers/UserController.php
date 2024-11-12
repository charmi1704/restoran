<?php

namespace App\Http\Controllers;

use App\Mail\forgotemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

use App\Mail\welcomemail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_arr = user::all();
        return view('admin.manage_user', ["user_arr" => $user_arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.signup');
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
            'img' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'mobile' => 'required'
        ]);

        $data = new user;
    $name=$data->name = $request->name;

        // image upload
        $file = $request->file('img');
        $filename = time() . '_img.' . $file->getClientOriginalExtension(); // 656676576_img.jpg
        $file->move('website/img/users/', $filename);  // use move for move image in public/images

        $data->img = $filename; // name store in db

    $email=$data->email = $request->email;
    $password=$request->password;
        $data->password = Hash::make($request->password);
        $data->mobile = $request->mobile;

        // mail code
        $mail_data=array("name"=>$name,"email"=>$email,"password"=>$password);
        Mail::to($email)->send(new welcomemail($mail_data));

        $data->save();
        Alert::success('Success Title', 'Signup Success');
        return redirect('/signup');
    }

    public function login(Request $request)
    {
        return view('website.login');
    }

    public function login_auth(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = user::where("email", $request->email)->first(); // single data first()     // ->get(); // arr
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                if ($data->status == "unblock") {

                    // create session
                    session()->put('ses_username', $data->name);
                    session()->put('ses_userid', $data->id);


                    Alert::success('Success', 'Login Success');
                    return redirect('/');
                } else {
                    Alert::error('Failed', 'Login Failed due Blocked Account');
                    return redirect('/login');
                }
            } else {
                Alert::error('Failed', 'Login Failed due wrong Password');
                return redirect('/login');
            }
        } else {
            Alert::error('Failed', 'Login Failed due wrong Email');
            return redirect('/login');
        }
    }

    function user_logout()
    {

        session()->pull('ses_userid');
        session()->pull('ses_username');
        Alert::success('Congrats', 'You\'ve Successfully Logout');
        return redirect('/');
    }

    public function userprofile()
    {
        //$data=user::all(); // all data in array
        $data=user::where("id",session()->get('ses_userid'))->first(); // single data 
        //$data=user::where("id",session()->get('ses_userid'))->get(); // get by con data arr 
        return view('website.userprofile',['data'=>$data]);
    }

    public function forgotpass(Request $request)
    {
        return view('website.forgotpass');
    }

    public function insert_forgotpass(Request $request)
    {
        $data=user::where("email",$request->email)->first();
        if($data)
        {
            $email=$data->email;
            $id=$data->id;

            $otp=rand(100000,999999);
            
            session()->put('ses_forgotid',$id); 
            session()->put('ses_otp',$otp); 

            $forgot_data=array("otp"=>session()->get('ses_otp'));
            Mail::to($email)->send(new forgotemail($forgot_data));
            return redirect('/enterotp');
        }
        else
        {
            Alert::error('error', 'Username Not valid');
            return redirect('/forgotpass');
        }
    }

    public function enterotp(Request $request)
    {
        return view('website.enterotp');
    }

    public function insert_enterotp(Request $request)
    {
        if(session()->get('ses_otp')==$request->otp)
        {
            session()->put('ses_reset',"reset");
            session()->pull('ses_otp');
            return redirect('/reset_pass');
        }
        else
        {
            Alert::error('error', 'OTP Not valid or Match');
            return redirect('/enterotp');
        }
    }   

    public function reset_pass(Request $request)
    {
        return view('website.reset_pass');
    }

    public function updatereset_pass($id,Request $request)
    {
        $data=user::find($id);
        $data->password=Hash::make($request->new_pass);
        $data->update();
        
        session()->pull('ses_reset');
        session()->pull('ses_forgotid');

        Alert::success('Success', 'Reset Password Success');
        return redirect('/login');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=user::find($id);
        $img=$data->img;
        unlink('website/img/users/'.$img);
		$data->delete();
        Alert::success('Success Delete', 'User Deleted Success');
		return redirect('/manage_user');
    }
}

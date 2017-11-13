<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
	use AuthenticatesUsers;
    
	public function dashboard(){
		return view('admin.home.dashboard');
	}

    public function change(){
        $info = DB::table('users')->first();
        return view('admin.home.change',['user'=>$info]);
    }

    public function adminChange(Request $request){
        $this->validate($request,[
            'uname' => 'required',
            'oldPass' => 'required',
            'pass' => 'required',
            ]);

        $oldPass = md5($request->oldPass);
        $result = DB::table('users')->where('password',$oldPass)->first();
        if(!$result){return redirect('/change')->with('message','Your Old Password Not Match !');}
        $setPass = DB::table('users')->update(['email'=>$request->uname,'password'=>md5($request->pass)]);
        if($setPass){return redirect('/change')->with('message','Your Password Changed Successfully !');}

        return view('admin.home.change',['user'=>$info]);
    }

	public function enterUser(){
	if (!Session::get('adminId')) {return view('admin.user.enter'); }else{return redirect('/dashboard'); }
	}

	public function entryCheck(Request $request){
		$this->validate($request,[
			'email' => 'required',
			'password' => 'required',
			]);

		if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $uname = $request->email;
        $password = $request->password;
        $password = md5($password);
        
        $result = DB::table('users')
        ->select('name','id','email')
        ->where('email',$uname)
        ->where('password',$password)
        ->first();
       if($result){
        Session::put('adminName',$result->name);
        Session::put('adminId',$result->id);
        Session::put('cusId',$result->id);
        Session::put('adminEmail',$result->email);
        return redirect('/dashboard'); }else{ return redirect('/admin')->with('message','Login Error !');}     
    }

/**
* ADMIN Logout Functions Here .
**/ 
  public function adminLogout()
    {
    Session()->forget('adminName');
    Session()->forget('adminId');
    Session()->forget('adminEmail');
    Session()->flush();
    return redirect('/admin');
    }    



}// End Admin Cotroller

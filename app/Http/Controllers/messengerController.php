<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class messengerController extends Controller{

//Messenger View Method here 
public function view(){
	return view('admin.messenger.inbox');}

//Messenger Admin User View View Method here
public function	getUser(){
$uId = Session::get('cusId');	
$info = DB::table('customer')->select('customer.fname','customer.lname','customer.id')
		->orderBy('id', 'desc')
		->where('id','!=',$uId)
		->get();
return 	$info;
}	

//Messenger Admin Messege View Method here
public function	getMessege($id=false){ 
$uId = Session::get('cusId');	
$info = DB::table('messenger')->select('messege','from_id','to_id','created_at')
		->where('from_id', $id)
		->where('to_id', $uId)
		->orwhere([
        ['from_id', $uId],
        ['to_id', $id],
    ])
    ->get();
return 	$info;
}

//Messenger Admin Messege View Method here
public function	sendMessege(Request $req){
$uId = Session::get('cusId');
$id = $req->uId;
$sms = $req->sms;

$result = DB::table('messenger')
				->insert(['from_id'=>$uId,'to_id'=>$id,'messege'=>$sms,'created_at'=>date('Y-m-d H:i:s')]);

if($result){
$info = DB::table('messenger')->select('messege','from_id','to_id','created_at')
		->where('from_id', $id)
		->where('to_id', $uId)
		->orwhere([
        ['from_id', $uId],
        ['to_id', $id],
    ])
    ->get();
return 	$info;
 }else{ return "Something Error !!"; }
}


/**
FronEnd Messenger Controller From Here ......................
 **/

//Messenger Front End Messege View Method From here
public function	getCusSms(){ 
$uId = Session::get('cusId');
$id = 1;	
$info = DB::table('messenger')->select('messege','from_id','to_id','created_at')
		->where('from_id', $id)
		->where('to_id', $uId)
		->orwhere([
        ['from_id', $uId],
        ['to_id', $id],
    ])
    ->get();
return 	$info;
}

public function	sendUserMessege(Request $req){ 
$uId = Session::get('cusId');
$id = $req->uId;
$sms = $req->sms;
$result = DB::table('messenger')
		->insert(['from_id'=>$uId,'to_id'=>$id,'messege'=>$sms,'created_at'=>date('Y-m-d H:i:s')]);
if($result){
$info = DB::table('messenger')->select('messege','from_id','to_id','created_at')
		->where('from_id', $id)
		->where('to_id', $uId)
		->orwhere([
        ['from_id', $uId],
        ['to_id', $id],
    ])
    ->get();
return 	$info;
 }else{ return "Something Error !!"; }
		
}



} // End messenger Controller Here 

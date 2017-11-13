<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

class customerController extends Controller
{

/**
* View Customer Functions Here .
**/ 	  

	public function viewCustomer(){ 
		$Info = DB::table('customer')
		->orderBy('id', 'desc')
		->select('fname','addr1','phone','email','id')
		->get();
		return view('admin.customer.viewCustomer',['customerValue'=>$Info]);
	}

	public function editCustomer($id){ 
		$cusVal = DB::table('customer')->where('id',$id)->first();
		return view('admin.customer.editCustomer',['cusVal'=>$cusVal]);
	}

    public function delCustomer($id){ 
    	$result = DB::table('customer')->where('id',$id)->delete();
    	if($result){ return redirect('/viewCustomer')->with('message','Item Delete Successfully !'); }else{
    		return redirect('/viewCustomer')->with('message','Somthing Error, Please Try Again !');}
    }

	public function singleCustomer($id){ 
	$Info = DB::table('customer')
	->orderBy('id', 'desc')
	->select('fname','lname','addr1','addr2','country','phone','email','id','city','created_at')
	->where('id',$id)->first();
	$order = DB::table('order')
	->orderBy('id', 'desc')
	->select('orderDate','deliveryDate','orderTotal','orderStatus','orderStatus','id')
	->where('customerId',$id)->get();
	return view('admin.customer.singleCustomer',['customerVal'=>$Info,'orderVal'=>$order]);
}

    public function updateCustomer(Request $request){ 
    	$this->validate($request,[
          'fname' => 'required',
          'addr1' => 'required',
          'city' => 'required',
          'email' => 'email',
          'phone' => 'required',
          'postCode' => 'required|numeric',
        ]);
        $cusId = $request->cusId;

    	$result = DB::table('customer')->where('id',$cusId)->update([
        'country' => $request->country,
        'fname' => $request->fname,
        'lname' => $request->lname,
        'cname' => $request->cname,
        'addr1' => $request->addr1,
        'addr2' => $request->addr2,
        'city' => $request->city,
        'postCode' => $request->postCode,
        'email' => $request->email,
        'phone' => $request->phone,
        'updated_at' => date('Y-m-d H:i:s')
        ]);
    	if($result){ return redirect('/viewCustomer')->with('message','Item Updated Successfully !'); }else{
    		return redirect('/viewCustomer')->with('message','Updating Error, Please Try Again !');}
    }

/**
* SEND SMG By Customer Functions Here .
**/ 
    public function cusMsg(Request $request){ 
        $this->validate($request,[
              'msg' => 'required',
            ]);
        $data = array(
        'name' => $request->name,    
        'subject' => $request->subject,
        'msg' => $request->msg,
        'phone' => $request->phone
            );
    $result = Mail::send('frontEnd.email.emailMsg',$data,function($message) use ($data){
            $message->to('heronzinfo@gmail.com');
            $message->subject($data['subject']);
            $message->from('abusabir1990@gmail.com');
        });
    return redirect('/contact')->with('message','Message Successfylly Send !');
    
    }    


}// End Customer Controller

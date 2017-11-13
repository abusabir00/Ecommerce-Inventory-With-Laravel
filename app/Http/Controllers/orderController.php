<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Mail;

class orderController extends Controller
{

/**
* View ORDER Functions Here .
**/ 	  

	public function delOrder($id,$shipId){

      try {
           DB::table('order')->where('id',$id)->delete();
           DB::table('shipping')->where('id',$shipId)->delete();
           DB::table('orderproduct')->where('orderId',$id)->delete();
           DB::commit(); 
           return redirect('/viewOrder')->with('message','Order Successfully Deleted !');
          } catch (\Exception $e) {
              DB::rollback(); 
              return redirect('/viewOrder')->with('message','Order Delete Error !');
              // something went wrong
          }
    }      
    	
/**
* View ORDER Functions Here .
**/ 	  

	public function viewOrder(){ 
		$Info = DB::table('order')
		->join('customer', 'order.customerId', '=', 'customer.id')
		->orderBy('id', 'desc')
		->select('order.*','customer.fname','customer.lname')
		->get();
		return view('admin.order.viewOrder',['orderValue'=>$Info]);
	}
/**
* View Delivered Functions Here .
**/ 	  
	public function delivered(){ 
		$Info = DB::table('order')
		->where('orderStatus','Delivery')		
		->join('customer', 'order.customerId', '=', 'customer.id')
		->orderBy('id', 'desc')
		->select('order.*','customer.fname','customer.lname','customer.phone')
		->get();
		return view('admin.order.delivered',['orderValue'=>$Info]);
	}	

/**
* SINGLE ORDER Functions Here .
**/ 	  

	public function singleOrder($id){ 
		$Info = DB::table('order')
		->join('customer', 'order.customerId', '=', 'customer.id')
		->join('shipping', 'order.shippingId', '=', 'shipping.id')
		->select('order.*','order.id as orderID','customer.*','customer.email as cusEmail','customer.city as cusCity','customer.phone as cusPhone','customer.addr1 as cusAddr1','customer.addr2 as cusAddr2','shipping.*')
		->where('order.id',$id)
		->first();
		$orderProduct = DB::table('orderproduct')
		->where('orderId',$id)
		->get();
		return view('admin.order.singleOrder',['allValue'=>$Info,'orderProduct'=>$orderProduct]);
	}
//Accept Order Function
	public function acceptOrder(Request $request){
	$id = $request->orderId; $cost = $request->trCost;	
	$result = DB::table('order')->where('id',$id)->update([
		'orderStatus'=>'Delivery','trCost'=>$cost,'updated_at'=>date('Y-m-d H:i:s')]);
	$Info = DB::table('order')
	->join('customer', 'order.customerId', '=', 'customer.id')
	->join('shipping', 'order.shippingId', '=', 'shipping.id')
	->select('order.*','order.id as orderID','customer.*','customer.email as cusEmail','customer.city as cusCity','customer.phone as cusPhone','customer.addr1 as cusAddr1','customer.addr2 as cusAddr2','shipping.*')
	->where('order.id',$id)
	->first();
	$orderProduct = DB::table('orderproduct')
	->where('orderId',$id)
	->get();
	$com = DB::table('comsetting')
	->select('phone','email','addr','name')
	->first();
	if(isset($Info->cusEmail)){
		$data = array('allValue'=>$Info,'orderProduct'=>$orderProduct,'com'=>$com);
	    $result = Mail::send('admin.order.memo',$data,function($message) use ($data){
	        $message->to($Info->cusEmail);
	        $message->subject('Heronz Memo');
	        $message->from('abusabir1990@gmail.com');
	    });
	}
	if($result){  return redirect('/delivered')->with('message','Order Delivered !'); }else{return redirect('/viewOrder')->with('message','Order Delivered Error !');}
	}
//Cancel Order Function
	public function cancelOrder($id){ $result = DB::table('order')->where('id',$id)->update([
		'orderStatus'=>'Canceled'
		]);
	if($result){  return redirect('/viewOrder')->with('message','Order Canceled !'); }else{return redirect('/viewOrder')->with('message','Order Canceled Error !');}
	}	


/**
* SINGLE ORDER confirmation Functions Here .
**/ 	  

	public function confirmation($id){ 
		$Info = DB::table('order')
		->join('customer', 'order.customerId', '=', 'customer.id')
		->join('shipping', 'order.shippingId', '=', 'shipping.id')
		->select('order.*','order.id as orderID','customer.*','customer.email as cusEmail','customer.city as cusCity','customer.phone as cusPhone','customer.addr1 as cusAddr1','customer.addr2 as cusAddr2','shipping.*')
		->where('order.id',$id)
		->first();
		$orderProduct = DB::table('orderproduct')
		->where('orderId',$id)
		->get();
		$com = DB::table('comsetting')
		->select('phone','email','addr','name')
		->first();
		return view('admin.order.complete',['allValue'=>$Info,'orderProduct'=>$orderProduct,'com'=>$com]);	
	}

	public function completed($id){
		$Info = DB::table('order')
		->join('customer', 'order.customerId', '=', 'customer.id')
		->select('order.*','order.id as orderID','customer.*','customer.email as cusEmail','customer.city as cusCity','customer.phone as cusPhone','customer.addr1 as cusAddr1','customer.addr2 as cusAddr2')
		->where('order.id',$id)
		->first();
		
		$proInfo = DB::table('orderproduct')
		->select('productId','productQuantity')
		->where('orderId',$id)
		->get();
		 try {
          foreach ($proInfo as $value) {
		DB::table('product')->where('id',$value->productId)->update(['qty'=> DB::raw('qty -' . $value->productQuantity)]);}
           DB::table('order')->where('id',$id)->update(['orderStatus'=>'Completed']);
           DB::table('income')->insert([
           	'date'=>date('Y-m-d'),
           	'cusId'=>$Info->id,
           	'orderId'=>$id,
           	'amount'=>$Info->orderTotal,
           	'created_at'=>date('Y-m-d H:i:s')
           	]);
           DB::commit();
		return redirect('/viewOrder')->with('message','Order Successfully Completed !');

	      } catch (\Exception $e) {
	          DB::rollback(); 
	          return redirect('/completed')->with('message','Order Corfirmation Error !');
	          // something went wrong
	      }	
	}
/**
* PDF Memo Generate Functions Here .
**/

	public function pdf($id){
		$Info = DB::table('order')
		->join('customer', 'order.customerId', '=', 'customer.id')
		->join('shipping', 'order.shippingId', '=', 'shipping.id')
		->select('order.*','order.id as orderID','customer.*','customer.email as cusEmail','customer.city as cusCity','customer.phone as cusPhone','customer.addr1 as cusAddr1','customer.addr2 as cusAddr2','shipping.*')
		->where('order.id',$id)
		->first();
		$orderProduct = DB::table('orderproduct')
		->where('orderId',$id)
		->get();
		$com = DB::table('comsetting')
		->select('phone','email','addr','name')
		->first();
		$pdf = PDF::loadView('admin.order.memo',['allValue'=>$Info,'orderProduct'=>$orderProduct,'com'=>$com]);
		return $pdf->download('memo.pdf');
}	



} // End Order Controller

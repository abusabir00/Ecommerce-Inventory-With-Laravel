<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class supplierController extends Controller
{
    public function viewSupplier(){
    	$info = DB::table('supplier')->orderBy('id', 'desc')->get();
		return view('admin.supplier.viewSupplier',['receiveValue'=>$info]);
	}

	public function addSupplier(){return view('admin.supplier.addSupplier');}

	public function storeSupplier(Request $request){
		$this->validate($request,[
			'comName' => 'required',
			'phone' => 'required',
			]);
		$result = DB::table('supplier')->insert([
		'comName' =>$request->comName,
		'name' =>$request->name,
		'phone' =>$request->phone,
		'addr' =>$request->addr,
		'created_at' =>date('Y-m-d H:i:s')
		]);
		if($result){ return redirect('/viewSupplier')->with('message','Supplier add Successfully !');}else{
			return redirect('/addSupplier')->with('message','Error!,Please Try Again');}
	}

	public function editSupplier($id){
    	$info = DB::table('supplier')->where('id', $id)->first();
		return view('admin.supplier.editSupplier',['supValue'=>$info]);
	}

	public function updateSupplier(Request $request){
		$this->validate($request,[
			'comName' => 'required',
			'phone' => 'required',
			]);
		$result = DB::table('supplier')->where('id',$request->supId)->update([
		'comName' =>$request->comName,
		'name' =>$request->name,
		'phone' =>$request->phone,
		'addr' =>$request->addr,
		'updated_at' =>date('Y-m-d H:i:s')
		]);
		if($result){ return redirect('/viewSupplier')->with('message','Supplier Update Successfully !');}else{
			return redirect('/editSupplier')->with('message','Error!,Please Try Again');}
	}

	public function delSupplier($id){
    	$result = DB::table('supplier')->where('id', $id)->delete();
		if($result){ return redirect('/viewSupplier')->with('message','Supplier Delete Successfully !');}else{
			return redirect('/editSupplier')->with('message','Delete Error!,Please Try Again');}
	}		

}//End Supplier Controller

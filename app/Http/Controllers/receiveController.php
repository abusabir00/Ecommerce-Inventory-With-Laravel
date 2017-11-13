<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class receiveController extends Controller
{
    public function viewReceive(){
    	$info = DB::table('receive')
		->join('product', 'receive.proId', '=', 'product.id')
		->join('supplier', 'receive.supplier', '=', 'supplier.id')
		->orderBy('id', 'desc')
		->select('receive.*','product.name','product.code','supplier.comName')
		->get();
		return view('admin.receive.viewReceive',['receiveValue'=>$info]);
	}

	public function advReceive(Request $request){
		$this->validate($request,['dateRange'=>'required']);
		$fullDate = explode(' to ', $request->dateRange);
		$start = $fullDate[0];
		$end = $fullDate[1];

    	$info = DB::table('receive')
		->join('product', 'receive.proId', '=', 'product.id')
		->join('supplier', 'receive.supplier', '=', 'supplier.id')
		->orderBy('id', 'desc')
		->select('receive.*','product.name','product.code','supplier.comName')
		->whereBetween('date',array($start, $end))->get();
		return view('admin.receive.viewReceive',['receiveValue'=>$info]);
	}


	public function addReceive(){
		$info = DB::table('categorie')->where('parent',0)->select('name','parent','id')->get();
		$sup = DB::table('supplier')->select('comName','id')->get();
		return view('admin.receive.addReceive',['catValue'=>$info,'supVal'=>$sup]);
	}


	public function proByCat(Request $request){
	$data = array();
	$data = DB::table('product')->where('cat',$request->itemId)->orderBy('id', 'desc')->select('name','id','qty','code')->get();
	echo "<option value='0'>-Select Size-</option>";	
	foreach ($data as $value) { echo "<option value='". $value->id ."'>". $value->name ."|| (" . $value->code . ") (" . $value->qty . ")</option>"; }
	}

	public function sizeByPro(Request $request){
	$data = DB::table('product')->where('id',$request->itemId)->select('size')->first();
	$sizeArray = explode(',', $data->size);// var_dump($sizeArray);
	foreach ($sizeArray as $value) { echo "<option value='". $value."'>". $value."</option>"; }
	}	


	public function storeReceive(Request $request){
		$this->validate($request,[
			'proId' => 'required',
			'supplier' => 'required',
			'qty' => 'required',
			'rate' => 'required',
			]);

		try {
		$result = DB::table('receive')->insertGetId([
		'supplier' =>$request->supplier,
		'proId' =>$request->proId,
		'date' =>date('Y-m-d'),
		'qty' =>$request->qty,
		'rate' =>$request->rate,
		'size' =>$request->proSize,
		'created_at' =>date('Y-m-d H:i:s')
		]);
		DB::table('expence')->insert([
		'supId' =>$request->supplier,
		'proId' =>$request->proId,
		'amount' =>($request->qty * $request->rate),
		'date' =>date('Y-m-d'),
		'created_at' =>date('Y-m-d')
		]);
		DB::table('product')->where('id',$request->proId)->update(['qty'=> DB::raw('qty +' . $request->qty)]);
        DB::commit(); 
       return redirect('/viewReceive')->with('message','Product Received Successfully !');
      } catch (\Exception $e) {
          DB::rollback(); 
          return redirect('/addReceive')->with('message','Product Received Error !');
          // something went wrong
      }
	}


	public function editReceive($id){
		$info = DB::table('categorie')->where('parent',0)->select('name','parent','id')->get();
		$sup = DB::table('supplier')->select('comName','id')->get();
		$recVal = DB::table('receive')
		->join('product', 'receive.proId', '=', 'product.id')
		->join('supplier', 'receive.supplier', '=', 'supplier.id')
		->select('receive.*','product.name','product.code','supplier.comName')
		->where('receive.id',$id)
		->first();
		return view('admin.receive.editReceive',['catValue'=>$info,'supVal'=>$sup,'recVal'=>$recVal]);
	}
	


	public function updateReceive(Request $request){
		$this->validate($request,[
			'proId' => 'required',
			'supplier' => 'required',
			'qty' => 'required',
			'rate' => 'required',
			]);
		
		try {
		DB::table('receive')->where('id',$request->recId)->update([
		'supplier' =>$request->supplier,
		'proId' =>$request->proId,
		'qty' =>$request->qty,
		'rate' =>$request->rate,
		'size' =>$request->size,
		'created_at' =>date('Y-m-d H:i:s')
		]);
		DB::table('expence')->where('supId',$request->recId)->update([
		'supId' =>$request->supplier,
		'proId' =>$request->proId,
		'amount' =>($request->qty*$request->rate),
		'updated_at' =>date('Y-m-d H:i:s')
		]);
		DB::table('product')->where('id',$request->pvId)->update(['qty'=> DB::raw('qty -' . $request->prevQty)]);
		DB::table('product')->where('id',$request->proId)->update(['qty'=> DB::raw('qty +' . $request->qty)]);
        DB::commit(); 
       return redirect('/viewReceive')->with('message',' Received update Successfully !');
      } catch (\Exception $e) {
          DB::rollback(); 
          return redirect('/editReceive')->with('message',' Received Update Error !');
          // something went wrong
      }
	}






}//End Recieve Controller

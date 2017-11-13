<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;

class productController extends Controller
{
    
	public function addProduct(){
		$Info = DB::table('categorie')->where('parent',0)->select('name','parent','id')->get();
		return view('admin.product.addProduct',['catValue'=>$Info]);
	}

	public function editProduct($id){
		$Info = DB::table('categorie')->where('parent',0)->select('name','parent','id')->get();
		$productValue = DB::table('product')->where('id',$id)->first();
		return view('admin.product.editProduct',['catValue'=>$Info,'product'=>$productValue]);
	}

	public function viewProduct(){
		$Info = DB::table('product')->orderBy('id', 'desc')->select('name','photo','status','id','qty')->get();
		return view('admin.product.viewProduct',['productValue'=>$Info]);
	}

	public function delProduct($id){
		$dir = 'public/admin/upload/product/'. $id;
    	$result = DB::table('product')->where('id',$id)->delete();
    	if($result){ $remove = $success = File::deleteDirectory($dir); }
    	if($remove){ return redirect('/viewProduct')->with('message','Item Delete Successfully !'); }else{
    	return redirect('/viewProduct')->with('message','Somthing Error, Please Try Again !');}
    }

	public function storeProduct(Request $request){ 

		$this->validate($request,[
			'code' => 'required',
			'name' => 'required',
			'cat' => 'required',
			'photo' => 'required',
			'newPrice' => 'required',
			'cat' => 'required',
			'status' => 'required',
			'qty' => 'required',
			]);
		$pSize = sizeof(explode(',',$request->size));
		$pPrice = sizeof(explode(',',$request->newPrice));
		if($pSize != $pPrice ){ return redirect('/addProduct')->with('message', 'Size & Price will be Equal!');}
			
		$pImage = $request->file('photo'); // Picture Processing From Here-----
		for($i=0;$i<sizeof($pImage);$i++){
			$pImageName[] = time() . uniqid() . $pImage[$i]->getClientOriginalName();}
		$serImage = serialize($pImageName);

		$result = DB::table('product')->insertGetId([
			'code' => $request->code,
			'name' => $request->name,
			'description' => $request->description,
			'cat' => $request->cat,
			'qty' => $request->qty,
			'newPrice' => $request->newPrice,
			'oldPrice' => $request->oldPrice,
			'size' => $request->size,
			'photo' => $serImage,
			'feture' => $request->feture,
			'status' => $request->status,
			'created_at' =>date('Y-m-d H:i:s')
			]);
		if($result){
			$uploadPath = 'public/admin/upload/product/'. $result;
			$newDir = File::makeDirectory($uploadPath, 0775, true);
			if($newDir){
	        for($i=0;$i<sizeof($pImageName);$i++){$pImage[$i]->move($uploadPath, $pImageName[$i]); }
	        return redirect('/viewProduct')->with('message', 'Produc Successfully Added !');	
	        }else{ DB::table('product')->where('id',$result)->delete(); 
	    	return redirect('/addProduct')->with('message', 'Image Uploading Error! , Product Not Added !');}
    	}else{ return redirect('/addProduct')->with('message', 'Something Error, Please Try Again !');}
	}


	public function updateProduct(Request $request){
		$this->validate($request,[
			'code' => 'required',
			'name' => 'required',
			'newPrice' => 'required',
			'cat' => 'required',
			'status' => 'required',
			]);
		$id = $request->pId;
		$pImage = $request->file('photo');
		
		$pSize = sizeof(explode(',',$request->size));
		$pPrice = sizeof(explode(',',$request->newPrice));
		if($pSize != $pPrice ){ return redirect('/addProduct')->with('message', 'Size & Price will be Equal!');}

		if($pImage != NULL){
		$DeletPath = 'public/admin/upload/product/'. $id;	
		$del = File::cleanDirectory($DeletPath);
		if($del){
		for($i=0;$i<sizeof($pImage);$i++){$pImageName[] = time() . uniqid() . $pImage[$i]->getClientOriginalName();$pImage[$i]->move($DeletPath, $pImageName[$i]);}
		$serImage = serialize($pImageName);	
	       }
	    DB::table('product')->where('id',$id)->update([ 'photo' => $serImage]);
		}

		$result = DB::table('product')->where('id',$id)->update([
			'code' => $request->code,
			'name' => $request->name,
			'description' => $request->description,
			'cat' => $request->cat,
			'newPrice' => $request->newPrice,
			'oldPrice' => $request->oldPrice,
			'size' => $request->size,
			'feture' => $request->feture,
			'status' => $request->status,
			'updated_at' =>date('Y-m-d H:i:s')
			]);
		if($result){return redirect('/viewProduct')->with('message', 'Produc Successfully Updated !');	
	      }else{ return redirect('/addProduct')->with('message', 'Something Error, Please Try Again !');}
	}


}//End Product Controller

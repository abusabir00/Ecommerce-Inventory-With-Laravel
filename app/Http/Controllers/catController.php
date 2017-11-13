<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class catController extends Controller
{
   
    public function addCategories(){ 
    	$info = DB::table('categorie')->where('parent',0)->select('name','parent','id')->get();
    	return view('admin.categories.addCategories',['catValue' =>$info]); 
    }

    public function viewCategorie(){ 
    	$info = DB::table('categorie')->orderBy('id', 'desc')->select('name','status','id')->paginate(5);
    	return view('admin.categories.viewCategorie',['catValue' =>$info]); 
    }

    public function delCategorie($id){ 
    	$result = DB::table('categorie')->where('id',$id)->delete();
    	if($result){ return redirect('/viewCategorie')->with('message','Item Delete Successfully !'); }else{
    		return redirect('/viewCategorie')->with('message','Somthing Error, Please Try Again !');}
    }

    public function editCategorie($id){ 
        $info = DB::table('categorie')->where('parent',0)->select('name','parent','id')->get();
        $cat = DB::table('categorie')->where('id',$id)->first();
        return view('admin.categories.editCategories',['catValue' =>$info,'cat'=>$cat]);
    }

    public function singleCategorie($id){ 
    	$info = DB::table('categorie')->where('id',$id)->get();
    	return view('admin.categories.singleCategorie',['catValue' =>$info]);
    }

    public function storeCategorie(Request $request){ 
    		$this->validate($request,[
    			'name' => 'required | max:50',
    			'description' => 'max:150',
    			'parentCat' => 'required',
    			'status' => 'required',
    			]);
    		$result = DB::table('categorie')->insert([
    			'name' => $request->name,
    			'description' => $request->description,
    			'parent' => $request->parentCat,
    			'status' => $request->status,
    			'deletion' => 0,
    			'created_at' => date('Y-m-d H:i:s')
    			]);
    		if($result){ return redirect('/viewCategorie')->with('message','Categorie Added Successfully !'); }else{
    			return redirect('/addCategories')->with('message','Something Error, Plese Try Again !');
    		}

    	}
    public function updateCategorie(Request $request){ 
            $this->validate($request,[
                'name' => 'required | max:50',
                'description' => 'max:150',
                'parentCat' => 'required',
                'status' => 'required',
                ]);
            $result = DB::table('categorie')->where('id',$request->catId)->update([
                'name' => $request->name,
                'description' => $request->description,
                'parent' => $request->parentCat,
                'status' => $request->status,
                'deletion' => 0,
                'updated_at' => date('Y-m-d H:i:s')
                ]);
            if($result){ return redirect('/viewCategorie')->with('message','Categorie Update Successfully !'); }else{
                return redirect('/addCategories')->with('message','Something Error, Plese Try Again !');
            }

        }    


}// End Categories Controller 

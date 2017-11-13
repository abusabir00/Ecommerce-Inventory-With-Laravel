<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class homeController extends Controller
{
	public function home(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
    	$slider = DB::table('slider')->get();
		return view('frontEnd.home.home',['catValue'=>$info,'slider'=>$slider]);
	}


	public function productByCat($id){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
		$product = DB::table('product')
		->select('name','photo','newPrice','oldPrice','id')
		->where('status',1)
		->where('cat',$id)
		->orderBy('id', 'desc')
		->paginate(10);
		return view('frontEnd.home.productByCat',['catValue'=>$info,'product'=>$product]);
	}

	public function singleProduct($id){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
		$product = DB::table('product')->select('name','photo','newPrice','oldPrice','id','description','size','code')->where('id',$id)->first();
		return view('frontEnd.home.singleProduct',['catValue'=>$info,'pro'=>$product]);
	}

	public function contact(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
		return view('frontEnd.includes.contact',['catValue'=>$info]);
	}

	public function about(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
		return view('frontEnd.includes.about',['catValue'=>$info]);
	}


	public function viewEnv(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
    	$env = DB::table('comsetting')->select('envPolicy')->first();
    	$general = DB::table('comsetting')->select('facebook','google','twitter')->first();
		return view('frontEnd.general.envPolicy',['catValue'=>$info,'env'=>$env,'general'=>$general]);
	}

	public function viewQua(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
    	$env = DB::table('comsetting')->select('quaPlicy')->first();
    	$general = DB::table('comsetting')->select('facebook','google','twitter')->first();
		return view('frontEnd.general.quaPolicy',['catValue'=>$info,'env'=>$env,'general'=>$general]);
	}

	public function interior(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
    	$env = DB::table('comsetting')->select('message')->first();
    	$general = DB::table('comsetting')->select('facebook','google','twitter')->first();
		return view('frontEnd.general.interior',['catValue'=>$info,'env'=>$env,'general'=>$general]);
	}

	public function ViewAboutUs(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
    	$about = DB::table('about')->select('aboutUs')->first();
    	$general = DB::table('comsetting')->select('facebook','google','twitter')->first();
		return view('frontEnd.about.aboutUs',['catValue'=>$info,'about'=>$about,'general'=>$general]);
	}

	public function ViewMisVis(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
    	$about = DB::table('about')->select('misVis')->first();
    	$general = DB::table('comsetting')->select('facebook','google','twitter')->first();
		return view('frontEnd.about.misVis',['catValue'=>$info,'about'=>$about,'general'=>$general]);
	}

	public function viewMessage(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
    	$about = DB::table('about')->select('message')->first();
    	$general = DB::table('comsetting')->select('facebook','google','twitter')->first();
		return view('frontEnd.about.message',['catValue'=>$info,'about'=>$about,'general'=>$general]);
	}

	public function offer(){ 
		$info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
    	$offer = DB::table('comsetting')->select('offer')->first();
    	$general = DB::table('comsetting')->select('facebook','google','twitter')->first();
		return view('frontEnd.general.offer',['catValue'=>$info,'offer'=>$offer,'general'=>$general]);
	}


	


} // End Home Controller

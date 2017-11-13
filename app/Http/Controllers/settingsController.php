<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class settingsController extends Controller
{

/**
* View AddSlider Image Page.
*/
    public function addSlider(){ return view('admin.settings.slider.addSlider'); }

/**
* View Manage Slider Image Page.
*/
    public function viewSlider(){
    $Info = DB::table('slider')->get();
     return view('admin.settings.slider.viewSlider',['slider' => $Info]); }

/**
* DELETE Manage Slider Image Page.
*/
    public function delSlider($id){
    $photo = DB::table('slider')->select('photo')->where('id',$id)->get();
    $result = DB::table('slider')->where('id',$id)->delete(); 
    if($result){ $del = unlink($photo[0]->photo) ; }
    if($del){ return redirect('/viewSlider')->with('message','Item Delete Successfully !'); }else{
    return redirect('/viewSlider')->with('message','Somthing Error, Please Try Again !');} 
 }     



/**
* Store Slider Image to database .
*/
    public function storeSlider(Request $request){
      $this->validate($request, [
            'name' => 'required',
            'photo' => 'mimes:jpeg,jpg,png | dimensions:width=1150,height=500',
        ]);
        $created_at = date('Y-m-d H:i:s');
        $name = $request->name;
        $sliderImage = $request->file('photo');
        $imageName = $sliderImage->getClientOriginalName();
        $uploadPath = 'public/admin/upload/slider/';
        $sliderImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        
        $result =  DB::table('slider')->insert([
            'name' => $request->name,
            'photo' => $imageUrl,
            'created_at' => $created_at
        ]);
         if($result){ return redirect('/viewSlider')->with('message', 'New Slider Added successfully');}else{
           return redirect('/addSlider')->with('message', 'About Page Not Changed !!'); 
        }
 }

/**
* General Setting Page.
*/
    public function general(){
    $Info = DB::table('comsetting')->first();
     return view('admin.settings.comSetting',['com' => $Info]); 
    } 

/**
* General Setting Page.
*/
    public function addGeneral(Request $request){
    $this->validate($request, [
            'name' => 'required',

        ]);

    $result =  DB::table('comsetting')->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'addr' => $request->addr,
        'offer' => $request->offer,
        'facebook' => $request->facebook,
        'google' => $request->google,
        'twitter' => $request->twitter,
        'vat' => $request->vat,
        'terms' => $request->terms,
        'envPolicy' => $request->envPolicy,
        'quaPlicy' => $request->quaPlicy,
        'message' => $request->message,
        'updated_at' => date('Y-m-d H:i:s')
        ]);
    if($request->file('download') != ''){
    $file = $request->file('download');
    $fileName = $file->getClientOriginalName();
    $uploadPath = 'public/admin/upload/download/';
    $file->move($uploadPath, $fileName);
    $fileUrl = $uploadPath . $fileName;
    DB::table('comsetting')->update(['download'=>$fileUrl ]);
    }
    if($result){ return redirect('/general')->with('message', 'Changed Saved successfully');}else{
           return redirect('/general')->with('message', 'Setting Not Changed !!');} 
    } 

/**
* About Setting Page.
*/
    public function addAbout(){
    $Info = DB::table('about')->first();
     return view('admin.settings.aboutSetting',['about' => $Info]); 
    }

/**
* General Setting Page.
*/
    public function storeAbout(Request $request){
    $this->validate($request, [
            'about' => 'required',
        ]);
    $result =  DB::table('about')->update([
        'aboutUs' => $request->about,
        'misVis' => $request->misVis,
        'message' => $request->message,
        'updated_at' => date('Y-m-d H:i:s')
        ]);
    if($result){ return redirect('/about')->with('message', 'Changed Saved successfully');}else{
           return redirect('/about')->with('message', 'Setting Not Changed !!');} 
    }      


  


    
} // End Settings Controller

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Session;

class cartController extends Controller
{
    /**
     * Add To Cart Cart Functions Here .
    **/

    public function cart(){
        $Info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
        return view('frontEnd.cart.cart',['catValue'=>$Info]);
    }


    public function delCartRow($rowId){ $result = Cart::remove($rowId); return redirect('/cart'); }
    

    public function addToCart(Request $request)
    {
       $pId = $request->pId;
       $qty =  $request->qty;
       $color = $request->color;
       $key =  $request->size;
       $photo =  $request->photo; 
       $result = DB::table('product')->select('name','newPrice','code','qty','size')->where('id',$pId)->first();
       $name = $result->name;
       $proPrice = explode(',',$result->newPrice);
       $price = $proPrice[$key];
       $proSize = explode(',',$result->size);
       $size = $proSize[$key];
       $code = $result->code;
       $dqty = $result->qty; var_dump($proPrice);
       if($qty>$dqty){ return redirect('/singleProduct/'. $pId)->with('message','This Quantity Limit Out of Stock!'); }
       $addCart = Cart::add(['id' => $code, 'name' => $name,'qty' => $qty, 'price' => $price, 'options' => ['photo' => $photo,'pId' =>$pId,'color'=>$color,'size'=>$size]]);
       if($addCart){ return redirect('/cart');}
    }

    public function checkout(){
        $Info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
        return view('frontEnd.cart.checkout',['catValue'=>$Info]);
    }

/**
* Login Functions Here .
**/ 

  public function customerLogin(Request $request){
    $this->validate($request,[
      'customer_email' => 'required',
      'customer_pass' => 'required',
    ]);

    $result = DB::table('customer')
      ->select('fname','id','email')
      ->where('email',$request->customer_email)
      ->where('pass',md5($request->customer_pass))
      ->first();

     if($result){ 
      Session::put('cusName', $result->fname);
      Session::put('cusId', $result->id);
      return redirect('/cart'); }else{ return redirect('/cart')->with('message','Login Error !');}   

  }    


/**
* Store Customer And Order Functions Here .
**/    


  public function storeCustomer(Request $request)
    {

    if(!Session::get('cusId')){   
      $this->validate($request,[
          'fname' => 'required',
          'pass' => 'required|min:6',
          'addr1' => 'required',
          'city' => 'required',
          'email' => 'email|unique:customer,email',
          'phone' => 'required',
          'postCode' => 'required|numeric',
        ]);
    }
      
    $diffShipping = $request->shippingAddr;
    $sameAddr = $request->sameAddr;
    if($sameAddr == 1 or $diffShipping==''){ $address1 = $request->addr1; $address2 = $request->addr2;}else{
    $address1 = $request->shippingAddr;  $address2 = $request->shippingAddr;}
      
    if($request->pass != $request->repass){ return redirect('/cart')->with('message', 'Password Not Match !'); }

    if(!Session::get('cusId')){
        $result = DB::table('customer')->insertGetId([
        'country' => $request->country,
        'fname' => $request->fname,
        'lname' => $request->lname,
        'pass' => md5($request->pass),
        'cname' => $request->cname,
        'addr1' => $request->addr1,
        'addr2' => $request->addr2,
        'city' => $request->city,
        'postCode' => $request->postCode,
        'email' => $request->email,
        'phone' => $request->phone,
        'created_at' => date('Y-m-d H:i:s')
        ]);
        if($result){Session::put('cusName', $request->fname); Session::put('cusId', $result); }
      }else{ $result = Session::get('cusId'); }


      try{
            $shipping = DB::table('shipping')->insertGetId([
            'country' => $request->country,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'addr1' => $address1,
            'addr2' => $address2,
            'city' => $request->city,
            'postCode' => $request->postCode,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => date('Y-m-d H:i:s')
            ]);
           $order = DB::table('order')->insertGetId([
            'customerId' => $result,
            'shippingId' => $shipping,
            'orderDate' => date('Y-m-d'),
            'deliveryDate' => $request->date,
            'orderTotal' =>   $request->amount,
            'created_at' => date('Y-m-d H:i:s')
            ]);

            $cartValue = Cart::content();
            foreach ($cartValue as $key => $value) {
            $orderProduct = DB::table('orderproduct')->insertGetId([
            'orderId' => $order,
            'productId' => $value->options->pId,
            'productName' => $value->name,
            'productColor' => $value->options->color,
            'productSize' =>  $value->options->size,
            'productPrice' => str_replace(',','',$value->price),
            'productQuantity' => $value->qty,
            'created_at' => date('Y-m-d H:i:s')
            ]);
            }

            DB::commit(); 
            Cart::destroy();
            return redirect('/order/complete'); 
          }catch (\Exception $e) {
              DB::rollback();
              return redirect('/cart')->with('message','You Loged In Successfully, Please Complete Order Process !');
              // something went wrong
          }     

 }
 

/**
* Logout Functions Here .
**/ 
  public function customerLogout()
    {
    Session()->forget('cusName');
    Session()->forget('cusId');
    Session()->flush();
    return redirect('/');
    }

    /**
     * Add To Cart Cart Functions Here .
    **/

    public function complete(){
        $Info = DB::table('categorie')->select('name','parent','id')->where('parent',0)->get();
        return view('frontEnd.cart.thankyou',['catValue'=>$Info]);
    }    
    
    
    
} // Cart Controller End Here -------------

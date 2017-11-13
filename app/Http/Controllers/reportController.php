<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class reportController extends Controller
{
	public function report(){
		$start = date('Y-m-01');
		$end = date('Y-m-d');

		$dates = date_create($start);
		$orSt = date_format($dates, 'Y-m-d H:i:s');
		$orEn = date('Y-m-d H:i:s');
		

    	$income = DB::table('income')
		->join('customer', 'income.cusId', '=', 'customer.id')
		->orderBy('id', 'desc')
		->select('income.*','customer.fname','customer.lname')
		->whereBetween('date',array($start, $end))->get();

		$expence = DB::table('expence')
		->join('supplier', 'expence.supId', '=', 'supplier.id')
		->orderBy('id', 'desc')
		->select('expence.*','supplier.comName')
		->whereBetween('date',array($start, $end))->get();

		$order = DB::table('order')->select('id')->whereBetween('updated_at',array($orSt, $orEn))->get();

		return view('admin.report.report',['expence'=>$expence,'income'=>$income,'order'=>$order]);
	}

	public function viewReport(Request $request){
		$this->validate($request,['dateRange'=>'required']);
		$fullDate = explode(' to ', $request->dateRange);
		$start = $fullDate[0];
		$end = $fullDate[1];
		
		$dates = date_create($start);
		$orSt = date_format($dates, 'Y-m-d H:i:s');
		$orEn = date('Y-m-d H:i:s');

		$income = DB::table('income')
		->join('customer', 'income.cusId', '=', 'customer.id')
		->orderBy('id', 'desc')
		->select('income.*','customer.fname','customer.lname')
		->whereBetween('date',array($start, $end))->get();

		$expence = DB::table('expence')
		->join('supplier', 'expence.supId', '=', 'supplier.id')
		->orderBy('id', 'desc')
		->select('expence.*','supplier.comName')
		->whereBetween('date',array($start, $end))->get();

		$order = DB::table('order')->select('id')->whereBetween('updated_at',array($orSt , $orEn))->get();
		
		return view('admin.report.report',['income'=>$income,'expence'=>$expence,'order'=>$order]);

	}





}//End Report Class

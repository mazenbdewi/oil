<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB ;
use App\Order ;
use App\Product ;

class PrintController extends Controller
{
    public function index()
    {
    	return view('admin.inv.viewPrint');
    }

    public function printPreview($id)
    {
    	$order= Order::find($id);
    	$productNames = DB::table('products')
    					->join('orderdetails','products.id','=','orderdetails.product_id') 					
    					->select('productName','orderdetails.productOrderPrice'
    						,'orderdetails.productOrderQuantity','productOrderDis')
    					->where('orderdetails.order_id','=',$id)
    					->get();


         return view('admin.inv.bill')->with('order',$order)
         							  ->with('productNames',$productNames);

    }
}

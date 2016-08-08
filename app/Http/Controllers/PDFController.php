<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use PDF ;
use App\Order ; 
use DB ;

class PDFController extends Controller
{
    public function getPDF($id)
    {
    	$order= Order::find($id);
    	$productNames = DB::table('products')
    					->join('orderdetails','products.id','=','orderdetails.product_id') 					
    					->select('productName','orderdetails.productOrderPrice'
    						,'orderdetails.productOrderQuantity','productOrderDis')
    					->where('orderdetails.order_id','=',$id)
    					->get();


         
    	$pdf=PDF::loadView('admin.inv.bill',['order'=>$order,'productNames'=>$productNames]);

    	return $pdf->stream('bill.pdf');
    }
}

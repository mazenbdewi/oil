<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order ;
use App\Product ;
use App\Employee ;
use App\Customer ;
use DB ;
use App\Product_Order ;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $orders = Order::all();
        $employees=Employee::lists('employeeFirstName','employeeLastName','id');
        $customers=Customer::lists('customerFirstName','customerLastName','id');



        return view('admin.ordersells.add')->with('orders',$orders)
        ->with('employees',$employees)->with('customers',$customers);  
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all() ;

      $employees=Employee::lists('employeeFirstName','employeeLastName','id');
    $customers=Customer::lists('customerFirstName','customerLastName','id');      

      return view('admin.ordersells.add')->with('orders',$orders)
      ->with('employees',$employees)->with('customers',$customers);
    }  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $order = Order::all();
         


        $orderType=$request->input('orderType');
        $orderDate=$request->input('orderDate');
        $orderShipperName=$request->input('orderShipperName');
        $orderShipperDate=$request->input('orderShipperDate');
        $orderShipperPrice=$request->input('orderShipperPrice');
        $employee_id=$request->input('employee_id');
        $orderPaymentType=$request->input('orderPaymentType');
        $orderDiscount=$request->input('orderDiscount');
        
       
        $productName=$request->productName;
        $products=DB::table("products")
                ->where("productName",$productName)
                ->select("id")
                ->first();
            

        $ID_Order = DB::table("orders")->insertGetId(["orderType"=>$orderType
         ,"orderDate"=>$orderDate,
         "orderShipperName"=>$orderShipperName,
         "orderShipperDate"=>$orderShipperDate,"employee_id"=>$employee_id
         ,"orderShipperPrice"=>$orderShipperPrice,"orderDiscount"=>$orderDiscount,
         "orderPaymentType"=>$orderPaymentType ]);

        if($products !=null){

            $product_id=$products->id ;
            DB::table("product_order")
            ->insert(["order_id"=>$ID_Order , "product_id"=>$product_id]);
        }
        
        return redirect('/adminpanel/ordersells/create');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $order =Order::find($id) ;
         $productSelect=Product::lists('productName','id');


          $discount=$order->orderDiscount; 


       $totals = 0;
       $totalAllQuantity = 0;
       $discountBill= 0 ;

       foreach($order->products as $product ) 
       {
       

        $total = ($product->pivot->productOrderPrice *$product->pivot->productOrderQuantity) ;
        $totalQuantity=$product->pivot->productOrderQuantity;

        $totalAllQuantity+=$totalQuantity;
        $totals += $total;
        $discountBill=$totals-(($totals*$discount)/100);
        
       }


      
     
   
        
        return view('admin.ordersells.addProduct')->with('productSelect',$productSelect)
        ->with('order',$order)->with('totals',$totals)
        ->with('totalAllQuantity',$totalAllQuantity)
        ->with('discountBill',$discountBill);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderType=$request->input('orderType');
        $orderCode=$request->input('orderCode');
        $orderDate=$request->input('orderDate');
        //$employeeFirstName=$request->input('employeeFirstName');
        $shipperName=$request->input('orderShipperName');
        $shipperDate=$request->input('orderShipperDate');
        $shipperPrice=$request->input('orderShipperPrice');
        $orderDuDate=$request->input('orderDuDate');
        $orderPaymentType=$request->input('orderPaymentType');
        $orderDiscount=$request->input('orderDiscount');
        //$productWarehouse=$request->input('productWarehouse');
        $orderNote=$request->input('orderNote');


        $update_order = Order::find($id);

        $update_order->orderType=$orderType;
        $update_order->orderCode=$orderCode;
        $update_order->orderDate=$orderDate;
       // $update_order->employeeFirstName=$employeeFirstName;
        $update_order->shipperName=$orderShipperName;
        $update_order->shipperDate=$orderShipperDate;
        $update_order->shipperPrice=$orderShipperPrice;
        $update_order->orderDuDate=$orderDuDate;
        $update_order->orderPaymentType=$orderPaymentType;
        $update_order->orderDiscount=$orderDiscount;
       // $update_order->productWarehouse=$productWarehouse;
        $update_order->orderNote=$orderNote;
        $update_order->save();
        
        return redirect('/adminpanel/ordersells/create');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Order $order)
    {
         $order->find($id)->delete();

        return redirect('/adminpanel/ordersells');    }




    

}

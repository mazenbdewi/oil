<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB ;

class OrderdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all() ;
        

      return view('admin.ordersells.index')->with('orders',$orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $productName=$request->productName;
        $products=DB::table("products")
                ->where("productName",$productName)
                ->select("id")
                ->first();

        $ID_Order = DB::table("orders")->insertGetId(["orderType"=>$orderType ,"orderCode"=>$orderCode,"orderDate"=>$orderDate,"orderDuDate"=>$orderDuDate,"orderPaymentType"=>$orderPaymentType ]);


                $product_id=$products->id ;
            DB::table("products_orders_relationship")
            ->insert(["order_id"=>$ID_Order , "product_id"=>$product_id]);


            return redirect('/adminpanel/ordersells/$order->id');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

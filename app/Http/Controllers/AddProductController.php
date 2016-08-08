<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB ;

use App\Order ;
use App\Product ;

class AddProductController extends Controller
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
       
    // return view('admin.ordersells.add')->with('products',$products) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {

        $productName=$request->input('product_id');
         $productOrderPrice=$request->productOrderPrice;
         $productOrderQuantity=$request->productOrderQuantity;
         $productOrderUnit=$request->productOrderUnit;
         $productOrderAllPrice=$request->productOrderAllPrice;


         $products=DB::table("products")
         
                ->where("productName",$productName)
                ->select("id")
                ->first();

                $ID_Order = $request->order_id ;
        if($products !=null){

            $product_id=$products->id ;
            DB::table("product_order")
            ->insert(["order_id"=>$ID_Order , "product_id"=>$product_id ,"productOrderPrice"=>$productOrderPrice,
                    "productOrderQuantity"=>$productOrderQuantity,"productOrderUnit"=>$productOrderUnit,
                    "productOrderAllPrice"=>$productOrderAllPrice]);






          $product = Product::find($productName);  
          $sub = $product->productQuntity-$productOrderQuantity ;

         // $product->productQuntity->$sub;

          DB::table('products')->where('productName',$productName)->update(['productQuntity'=>$sub]);
     
               

        }


        return redirect("/adminpanel/ordersells/".$ID_Order) ;


    

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
    public function destroy($id ,  Request $request )
    {
        $ID_Order = $request->order_id ;
        DB::table("product_order")->where("product_id",$id)->delete();

        return redirect("/adminpanel/ordersells/".$ID_Order) ;
    }
}

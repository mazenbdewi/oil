<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB ;
use App\Order ;
use App\Product ;
use App\Employee;



class InvoiceController extends Controller
{

    public function index()

    {
                 $employees = \DB::table('employees')->lists('employeeFirstName', 'id');

        $orders=Order::all();

        return view('admin.inv.index')->with('orders',$orders)->with('employees',$employees);
    }





    public function show($id)
    {
        
       // $orders = DB::table('orders')->select('id','orderDate','orderType')->where('id',$id)->get();
         

        $order= Order::find($id);

        $orderEmployees=DB::table('employees')
                        ->join('orders','employees.id','=','orders.employee_id')
                        ->select('employeeFirstName','employeeDiscount')
                        ->where('orders.id','=',$id)
                        ->get();

        $orderCustomers=DB::table('customers')
                        ->join('orders','customers.id','=','orders.customer_id')
                        ->select('customerFirstName')
                        ->where('orders.id','=',$id)
                        ->get();

        


        $productNames = DB::table('products')
                        ->join('orderdetails','products.id','=','orderdetails.product_id')                  
                        ->select('productName','orderdetails.productOrderPrice'
                            ,'orderdetails.productOrderQuantity','productOrderDis','productOrderAllPrice')
                        ->where('orderdetails.order_id','=',$id)
                        ->get();
        



                        

        return view('admin.inv.bill')->with('order',$order)->with('orderEmployees',$orderEmployees)
                                     ->with('orderCustomers',$orderCustomers)
                                     ->with('productNames',$productNames);


    }
    
    public function form()
    {
       // $employee=Employee::all();
         $employee = \DB::table('employees')->lists('employeeFirstName','id');
         $customer = \DB::table('customers')->lists('customerFirstName','id');

        $q= DB::table('products')->get();
        return view('admin.inv.form')->with('data',$q)->with('employee',$employee)->with('customer',$customer);
    }




    public function save(Request $request)
    {
        $post=$request->all();
        $data=array(

                'orderType'=>$post['orderType'],
                'orderDate'=>$post['orderDate'],
                'orderPayment'=>$post['orderPayment'],
                'orderRemainingPayment'=>$post['orderRemainingPayment'],
                'PaymentDate'=>$post['PaymentDate'],
                'orderPaymentType'=>$post['orderPaymentType'],
                'employee_id'=>$post['employee_id'],
                'customer_id'=>$post['customer_id']
                
            );

        $j=DB::table('orders')->insertGetId($data);
        if($j>0)
        {
            for($i=0;$i<count($post['product_id']);$i++)
            {
                $datadetail = array(

                    'order_id'=>$j,
                    'product_id'=>$post['product_id'][$i],
                    'productOrderPrice'=>$post['price'][$i],
                    'productOrderQuantity'=>$post['qty'][$i],
                    'productOrderDis'=>$post['dis'][$i],
                    'productOrderAllPrice'=>$post['amount'][$i]

                    );

                 $dis=$post['dis'][$i];

              
               $employee=Employee::find($data['employee_id']); 

               $disEmployee = $employee->employeeDiscount ; 


             if ($dis<$disEmployee){

            session()->push('m','success'); 
            session()->push('m','section saved');


            DB::table('orderdetails')->insert($datadetail);
                
            
                
               
        DB::table('customers')->where('id',$post['customer_id'])
                              ->update([
                                'customerDebt'=>$post['orderPayment']
                                ,'customerPaymentDate'=>$post['PaymentDate']
                                ]);



            //##### sub quntity product from table Products 

                $p=$post['qty'][$i];

                  $product = Product::find($post['product_id'][$i]); 



                 $sub = $product->productQuntity-$p ;
                
        DB::table('products')->where('id',$post['product_id'][$i])->update(['productQuntity'=>$sub]);


        // insert Debt to customer 
               
                    
      

            }

     
           else
        {
            session()->push('m','danger'); 
            session()->push('m','Error Discount');
        }
          return redirect('/adminpanel/inv/form');                    
        }
    } }

    public function destroy($id , Order $order)

    {
        $order->find($id)->delete();
        
        DB::table('orderdetails')->where('order_id',$id)->delete();

        return redirect('/adminpanel/inv/');
    }

}
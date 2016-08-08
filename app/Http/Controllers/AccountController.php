<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB ;
use App\Account ;
use App\Cash ;
use App\Bank ;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$accounts = DB::table('accounts')->get();
        $accounts= Account::all();



         $totals=0;
        foreach ($accounts as $account){
            
            $totals+=$account->accountSub;
          //  DB::table('accounts')->insert(['accountTotalAmount'=>$totals]);
        }


        return view('admin.accounts.add')->with('accounts',$accounts)->with('totals',$totals) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $accountName=$request->input('accountName');
        $accountDate=$request->input('accountDate');
        $accountSub=$request->input('accountSub');
        $accountNote=$request->input('accountNote');
        $bankName=$request->input('bankName');

        $accounts =DB::table('accounts')->insert(['accountName'=>$accountName,'accountDate'=>$accountDate,
            'accountSub'=>$accountSub,'accountNote'=>$accountNote,'bankName'=>$bankName]);

         if($bankName=='cash'){
        

        $cash=Cash::find(1);


                $sub = $cash->cashMoney - $accountSub ;


          DB::table('cashes')->update(['cashMoney'=>$sub]);

      }
      else 

      {


        $bank=Bank::find(1);


                $sub = $bank->bankMoney - $accountAmount ;


          DB::table('banks')->update(['bankMoney'=>$sub]);
      }


       



        return redirect ('/adminpanel/accounts/create') ;
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

     public function showCash(Request $request)
     {
        $showCash=DB::table('accounts')->where('bankName','=','cash')->select('accountName','accountDate',
            'accountSub','accountSum')->get();

        $sum=0;
        foreach($showCash as $showCashs)
        $sum+=$showCashs->accountSub;

    $cash=Cash::find(1);


                $cashNow = $cash->cashMoney ;
        

        return view('admin.accounts.showCash')->with('showCash',$showCash)->with('sum',$sum)
                                                ->with('cashNow',$cashNow);
    }

}
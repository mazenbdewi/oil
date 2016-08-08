<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB ;
use App\Account ;
use App\Cash ;
use App\Bank ;

class IncomesController extends Controller
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
          $accounts= Account::all();



         $totals=0;
        foreach ($accounts as $account){
            
            $totals+=$account->accountSum;
          //  DB::table('accounts')->insert(['accountTotalAmount'=>$totals]);
        }


        return view('admin.incomes.add')->with('accounts',$accounts)->with('totals',$totals) ;
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
        $accountSum=$request->input('accountSum');
        $accountNote=$request->input('accountNote');
        $bankName=$request->input('bankName');

        $accounts =DB::table('accounts')->insert(['accountName'=>$accountName,'accountDate'=>$accountDate,
            'accountSum'=>$accountSum,'accountNote'=>$accountNote,'bankName'=>$bankName]);

         if($bankName=='cash'){
        

        $cash=Cash::find(1);


                $sumin = $cash->cashMoney + $accountSum ;


          DB::table('cashes')->update(['cashMoney'=>$sumin]);

      }
      else 

      {


        $bank=Bank::find(1);


                $sumin = $bank->bankMoney + $accountSum ;


          DB::table('banks')->update(['bankMoney'=>$sumin]);
      }


       



        return redirect ('/adminpanel/incomes/create') ;
  
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

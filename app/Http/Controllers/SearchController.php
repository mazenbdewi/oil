<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class SearchController extends Controller
{
	public function index()
    {
      

      
       return view('search.search') ;
    }

     public function search(Request $request)
    {
        if ($request->ajax())
        {
            $output="";
            $employeesearchs=DB::table('employees')->where('employeeFirstName','LIKE','%'.$request->search.'%')
                                             ->orWhere('employeeLastName','LIKE','%'.$request->search.'%')
                                             ->get();

            if($employeesearchs)
            {
                foreach ($employeesearchs as  $employeesearch)
                
                $output.='<tr>'.
                         '<td>'.$employeesearch->id.'</td>'.
                         '<td>'.$employeesearch->employeeFirstName.'</td>'.
                         '<td>'.$employeesearch->employeeLastName.'</td>'.
                         '<td>'.$employeesearch->employeeMobile.'</td>'.
                         '</tr>';
            }

                return Response($output);
        }

}
}
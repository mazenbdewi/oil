<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB ;

use App\Employee ;

use App\Career ;

use Datatables ;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

       $employees = Employee::all();
 

       return view('admin.employees.index',compact('employees',$employees)) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$careers = \DB::table('careers')->lists('careerName', 'id');
        $careers=Career::lists('careerName', 'id');
        return view('admin.employees.add')->with('careers', $careers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      
        $career_id=$request->input('career_id');
        $employeeFirstName=$request->input('employeeFirstName');
        $employeeMiddleName=$request->input('employeeMiddleName');
        $employeeLastName=$request->input('employeeLastName');
        $employeeBrithday=$request->input('employeeBrithday');
        $employeeFrom=$request->input('employeeFrom');
        $employeeTo=$request->input('employeeTo');
        $employeeMobile=$request->input('employeeMobile');
        $employeePhoneHome=$request->input('employeePhoneHome');
        $employeePhoneJob=$request->input('employeePhoneJob');
        $employeeAddress=$request->input('employeeAddress');
        $employeeCity=$request->input('employeeCity');
        $employeeNational=$request->input('employeeNational');
        $employeeSalary=$request->input('employeeSalary');
        $employeeDiscount=$request->input('employeeDiscount');


       
        $new_employee = New Employee ;
       
        $new_employee->career_id=$career_id;
        $new_employee->employeeFirstName=$employeeFirstName;
        $new_employee->employeeMiddleName=$employeeMiddleName;
        $new_employee->employeeLastName=$employeeLastName;
        $new_employee->employeeBrithday=$employeeBrithday;
        $new_employee->employeeFrom=$employeeFrom;
        $new_employee->employeeTo=$employeeTo;
        $new_employee->employeeMobile=$employeeMobile;
        $new_employee->employeePhoneHome=$employeePhoneHome;
        $new_employee->employeePhoneJob=$employeePhoneJob;
        $new_employee->employeeAddress=$employeeAddress;
        $new_employee->employeeCity=$employeeCity;
        $new_employee->employeeNational=$employeeNational;
        $new_employee->employeeSalary=$employeeSalary;
        $new_employee->employeeDiscount=$employeeDiscount;
        $new_employee->save();





        return redirect ('/adminpanel/employees/create') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , Employee $employee)
    {
        $employee = $employee->find($id);
        $careers=Career::lists('careerName', 'id');

        return view('admin.employees.edit')->with('employee',$employee)->with('careers', $careers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ,Employee $employee)
    {

        $career_id=$request->input('career_id');
        $employeeFirstName=$request->input('employeeFirstName');
        $employeeMiddleName=$request->input('employeeMiddleName');
        $employeeLastName=$request->input('employeeLastName');
        $employeeBrithday=$request->input('employeeBrithday');
        $employeeFrom=$request->input('employeeFrom');
        $employeeTo=$request->input('employeeTo');
        $employeeMobile=$request->input('employeeMobile');
        $employeePhoneHome=$request->input('employeePhoneHome');
        $employeePhoneJob=$request->input('employeePhoneJob');
        $employeeAddress=$request->input('employeeAddress');
        $employeeCity=$request->input('employeeCity');
        $employeeNational=$request->input('employeeNational');
        $employeeSalary=$request->input('employeeSalary');
        $employeeDiscount=$request->input('employeeDiscount');

        
          $employee = Employee::find($id) ;

         $employee->career_id=$career_id;
         $employee->employeeFirstName=$employeeFirstName;
         $employee->employeeMiddleName=$employeeMiddleName;
         $employee->employeeLastName=$employeeLastName;
         $employee->employeeBrithday=$employeeBrithday;
         $employee->employeeFrom=$employeeFrom;
         $employee->employeeTo=$employeeTo;
         $employee->employeeMobile=$employeeMobile;
         $employee->employeePhoneHome=$employeePhoneHome;
         $employee->employeePhoneJob=$employeePhoneJob;
         $employee->employeeAddress=$employeeAddress;
         $employee->employeeCity=$employeeCity;
         $employee->employeeNational=$employeeNational;
         $employee->employeeSalary=$employeeSalary;
         $employee->employeeDiscount=$employeeDiscount;
         $employee->save() ;




         return redirect ('/adminpanel/employees');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Employee $employee)
    {
        $employee->find($id)->delete();

        return redirect('/adminpanel/employees');
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

    




 /*   public function anyData(Employee $employee)

    {



        $employees= $employee->all() ;
         return Datatabels::of($employees)->editColum('employeeFirstName' , function($model){

        return \Html::link('/adminpanel/employees'.$model->id.'/edit' , $model->employeeFirstName);
        })


            ->editColum('control' , function($model){

        $all = '<a href="/adminpanel/employees'.$model->id .'/edit" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';

        $all .= '<a href="/adminpanel/employees'.$model->id.'/delete" class="btn btn-denger btn-circle"><i class="fa fa-trash-o"></i></a>';
        return $all ;
        })
        ->make(true);
           
    } 
    */





}


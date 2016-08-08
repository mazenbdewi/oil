@extends('admin.layouts.layout')

@section('title')
أضف وظيفة جديدة
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		إضافة مستودع جديد     
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li ><a href="{{ url('/adminpanel/warehouses')}}">المستودعات</a></li>
        <li class="active"><a href="{{ url('/adminpanel/warehouses')}}">اضافة مستودع جديد</a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">  اضافة مستودع </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <div class="container">
                      
                          
                            <div class="panel=body">
                                <h2><br/> انشاء مستودع </h2><hr/>

                                  {!! Form::open(["url"=>"/adminpanel/warehouses" , "method"=>"POST" ]) !!}

                                   <td>    اسم المستودع  : {!! Form::text("warehouseName") !!} </td>
                                    <td>   عنوان المستودع  : {!! Form::text("warehouseCity") !!} </td>
                                   <td>    هاتف المستودع  : {!! Form::text("warehousePhone") !!} </td>
                                  {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!}
                                  {!! Form::close() !!}

                            </div>
                                 @if($warehouses !=null)

                                    <table class="table">
                                              <tr>
                                                    <th> اسم المستودع </th>
                                                    <th> عنوان المستودع</th>
                                                    <th> هاتف المستودع</th>

                                                    <th></th>

                                                    <th></th>
                                              </tr>
                                               @foreach($warehouses as $warehouse)

                                              <tr>




                                                  {!! Form::open(["url"=>"/adminpanel/warehouses/$warehouse->id" , "method"=>"PATCH" ]) !!}

                                                   <td> {!! Form::text("warehouseName",$warehouse->warehouseName) !!}</td>
                                               <td>    {!! Form::text("warehouseCity",$warehouse->warehouseCity) !!}</td>
                                                <td>   {!! Form::text("warehousePhone",$warehouse->warehousePhone) !!} </td>



                                                     
                                                   <td>     {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!} </td>
                                                  {!! Form::close() !!}

                                                       <td>


                                                   {!! Form::open(["url"=>"/adminpanel/warehouses/$warehouse->id" , "method"=>"delete" ]) !!}

                                               
                                                   {!! Form::submit("حذف" , ["class"=>"btn btn-danger"]) !!}
                                                   {!! Form::close() !!}

                                                        </td>
                   
                                               </tr>

                                                @endforeach
                                    </table>
                                 @endif
                 
                 </div>



            


          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection





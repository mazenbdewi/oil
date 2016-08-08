@extends('admin.layouts.layout')


@section('title')

التحكم في الموظفين 

@endsection


@section('header')

{!! Html::style('/maincontroller/plugins/datatables/dataTables.bootstrap.css') !!}

@endsection



@section('content')
<div class="box-body">
                <div class="container">
 

                        @if($orders !=null)

                              <table class="table">
                                          <tr>
                                             <th>رقم الفاتورة </th>
                                             <th>تاريخ الفاتورة</th>
                                             <th>تاريخ  الاستحقاق</th>
                                             <th> </th>
                                             <th></th>
                                          </tr>

                                          

                                          @foreach($orders as $order)

                                        <tr>          
                                   {!! Form::open(["url"=>"/adminpanel/inv/$order->id" , "method"=>"PATCH" ]) !!}

                                          <td> {!! Form::label("id",$order->id) !!}  </td>
                                          <td> {!! Form::label("orderDate",$order->orderDate) !!}  </td>
                                          <td> {!! Form::label("orderDate",$order->orderDate) !!}  </td>
                                          <td>     {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!} </td>
                                   {!! Form::close() !!}

                                           <td>  
                                                                  
                                   <td>
 
                          <a class="btn btn-danger" href="{{url('/adminpanel/inv/'.$order->id.'/delete')}}"> حذف</a></td>
                                  </td>

                                     </td>
                                     <td> <a href="/adminpanel/inv/{{$order->id}}" class="btn btn-default"> إضافة مواد </a></td>
                                                                                     
                                      </tr>

                                  @endforeach

                                    </table>
                             
                           @endif

               


                </div>
  </div>


@endsection









@section('footer')

{!! Html::script('/maincontroller/plugins/datatables/dataTables.bootstrap.min.js') !!}
{!! Html::script('/maincontroller/plugins/datatables/jquery.dataTables.min.js') !!}



@endsection

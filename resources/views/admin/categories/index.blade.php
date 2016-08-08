@extends('admin.layouts.layout')

@section('title')
أضف نوع جديد
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		إضافة نوع جديد     
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li ><a href="{{ url('/adminpanel/employees')}}">المواد </a></li>
        <li class="active"><a href="{{ url('/adminpanel/careers')}}">إضافة مادة جديد</a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">  إضافة نوع  جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <div class="container">
                      
                          
                            <div class="panel=body">
                                <h2><br/> انشاء نوع جديد </h2><hr/>

                                  {!! Form::open(["url"=>"/adminpanel/categories" , "method"=>"POST" ]) !!}

                                       أدخل نوع جديد  : {!! Form::text("categoryName") !!}
                                  {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!}
                                  {!! Form::close() !!}

                            </div>
                                 @if($categories !=null)

                                    <table class="table">
                                              <tr>
                                                    <th><h3>نوع المادة </h3></th>

                                                    <th><h3>تعديل</h3></th>

                                                    <th><h3>الحذف</h3></th>
                                              </tr>
                                               @foreach($categories as $category)

                                              <tr>




                                                  {!! Form::open(["url"=>"/adminpanel/categories/$category->id" , "method"=>"PATCH" ]) !!}

                                                   <td> {!! Form::text("categoryName",$category->categoryName) !!}  </td>
                                                   <td>     {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!} </td>
                                                  {!! Form::close() !!}

                                                       <td>


                                                   {!! Form::open(["url"=>"/adminpanel/categories/$category->id" , "method"=>"delete" ]) !!}

                                               
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





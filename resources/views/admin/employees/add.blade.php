@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		إضافة موظف       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li ><a href="{{ url('/adminpanel/employees')}}">التحكم بالموظفين </a></li>
        <li class="active"><a href="{{ url('/adminpanel/employees/create')}}">إضافة موظف جديد</a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف موظف جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(["url"=>"/adminpanel/employees" , "method"=>"POST" ]) !!}
            @include('admin.employees.form')
            {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection





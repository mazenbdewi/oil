@extends('admin.layouts.layout')

@section('title')
أضف مادة
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		إضافة مادى       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li ><a href="{{ url('/adminpanel/products')}}">المواد </a></li>
        <li class="active"><a href="{{ url('/adminpanel/products/create')}}">إضافة مادة</a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف مادة جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(["url"=>"/adminpanel/products" , "method"=>"POST" ]) !!}
            @include('admin.products.form')
            {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection





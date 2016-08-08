@extends('admin.layouts.layout')

@section('title')
تعديل المادة
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		تعديل المادة  
    {{ $product->productName }}      
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li ><a href="{{ url('/adminpanel/products')}}">المواد </a></li>
        <li class="active"><a href="{{ url('/adminpanel/products/'.$product->id.'/edit')}}">تعديل المادة </a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل المادة</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($product ,['route'=>['adminpanel.products.update',$product->id] , 'method'=>'PATCH']) !!}
            @include('admin.products.form')
            {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection





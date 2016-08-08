@extends('admin.layouts.layout')

@section('title')
تعديل زبون
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		تعديل  زبون
    {{ $customer->customerFirstName.' '.$customer->customerLastName }}      
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        
        <li class="active"><a href="{{ url('/adminpanel/customers/'.$customer->id.'/edit')}}">تعديل زبون </a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل زبون</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($customer ,['route'=>['adminpanel.customers.update',$customer->id] , 'method'=>'PATCH']) !!}
            @include('admin.customers.form')
            {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection





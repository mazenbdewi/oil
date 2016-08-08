@extends('admin.layouts.layout')

@section('title')
أضف زبون
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		أضف زبون      
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{ url('/adminpanel/customers/create')}}">أضف زبون جديد</a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف زبون جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(["url"=>"/adminpanel/customers" , "method"=>"POST" ]) !!}
            @include('admin.customers.form')
            {!! Form::submit("Add" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection





@extends('admin.layouts.layout')

@section('title')
تعديل مورد
@endsection


@section('header')


@endsection




@section('content')
 <section class="content-header">
      <h1>
		تعديل  مورد
    {{ $provider->providerFirstName.' '.$provider->providerLastName }}      
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        
        <li class="active"><a href="{{ url('/adminpanel/providers/'.$provider->id.'/edit')}}">تعديل مورد </a></li>
      </ol>
    </section>


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل مورد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($provider ,['route'=>['adminpanel.providers.update',$provider->id] , 'method'=>'PATCH']) !!}
            @include('admin.providers.form')
            {!! Form::submit("تعديل" , ["class"=>"btn btn-info"]) !!}
            {!! Form::close() !!}

          </div>
       </div>
     </div>
    </section>


@endsection



@section('footer')
@endsection





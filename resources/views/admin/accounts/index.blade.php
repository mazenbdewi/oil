@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')


{!! Form::select('bankName',array('cash'=>'cash','bank'=>'bank'))!!}



@foreach($accounts as $account)

{{$account->accountName}}
{{$account->accountDate}}


@endforeach





@endsection



@section('footer')
@endsection
@extends('admin.layouts.layout')


@section('title')

التحكم في الموظفين 

@endsection


@section('header')

{!! Html::style('/maincontroller/plugins/datatables/dataTables.bootstrap.css') !!}

@endsection



@section('content')

    <section class="content-header">
      <h1>
       المواد 
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{ url('/adminpanel/products')}}">المواد </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">المواد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>رقم المادة</th>
                  <th> اسم المادة </th>
                  <th> وصف المادة </th>
                  <th> السعر الصافي </th>
                  <th> الكمية</th>
                  <th> وحدة القياس</th>
                  <th> سعر الكمية الإجمالية</th>
                  <th>تعديل</th>
                  <th>حذف</th>
                  
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)

                <tr>
                  
                  <td>{{ $product->productCode }}</td>
                  <td>{{ $product->productName }}</td>
                  <td>{{ $product->productDescription }}</td>
                  <td>{{ $product->productNetPrice }}</td>
                  <td>{{ $product->productQuntity }}</td>
                  <td>{{ $product->productUnit }}</td>
                  <td>{{ $product->productTotalPrice }}</td>
                 
                  <td><a href="{{url('/adminpanel/products/'.$product->id.'/edit')}}"> التعديل</a> </td>
                  <td><a href="{{url('/adminpanel/products/'.$product->id.'/delete')}}"> حذف</a></td>
                  
                  
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                 <tr>
                  
                  <th>رقم المادة</th>
                  <th> اسم المادة </th>
                  <th> وصف المادة </th>
                  <th> السعر الصافي </th>
                  <th> الكمية</th>
                  <th> وحدة القياس</th>
                  <th> سعر الكمية الإجمالية</th>
                  <th>تعديل</th>
                  <th>حذف</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


@endsection









@section('footer')

{!! Html::script('/maincontroller/plugins/datatables/dataTables.bootstrap.min.js') !!}
{!! Html::script('/maincontroller/plugins/datatables/jquery.dataTables.min.js') !!}



@endsection

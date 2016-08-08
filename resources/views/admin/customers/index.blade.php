@extends('admin.layouts.layout')


@section('title')

معلومات الزبائن 

@endsection


@section('header')

{!! Html::style('/maincontroller/plugins/datatables/dataTables.bootstrap.css') !!}

@endsection



@section('content')

    <section class="content-header">
      <h1>
       الزبائن
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{ url('/adminpanel/customers')}}">الزبائن </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">بيانات الزبائن</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>الاسم الاول</th>
                  <th>الاسم الأب</th>
                  <th>الكنية</th>
                  <th> الجوال</th>
                  <th>هاتف العمل</th>
                  <th>هاتف المنزل</th>
                  <th>العنوان</th>
                  
                 
                  <th>تعديل</th>
                  <th>حذف</th>
                  
                </tr>
                </thead>
                <tbody>

                @foreach($customers as $customer)

                <tr>
                  <td>{{ $customer->customerFirstName }}</td>
                  <td>{{ $customer->customerMiddleName }}</td>
                  <td>{{ $customer->customerLastName }}</td>
                  <td>{{ $customer->customerMobile }}</td>
                  <td>{{ $customer->customerPhoneJob }}</td>
                  <td>{{ $customer->customerPhoneHome }}</td>
                  <td>{{ $customer->customerAddress }}</td>

                 
                  <td><a href="{{url('/adminpanel/customers/'.$customer->id.'/edit')}}"> التعديل</a> </td>
                  <td><a href="{{url('/adminpanel/customers/'.$customer->id.'/delete')}}"> حذف</a></td>
                  
                  
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>الاسم الاول</th>
                  <th>الاسم الأب</th>
                  <th>الكنية</th>
                  <th> الجوال</th>
                  <th>هاتف العمل</th>
                  <th>هاتف المنزل</th>
                  <th>العنوان</th>
                  
                 
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

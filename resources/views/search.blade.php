@extends('admin.layouts.layout')


@section('title')

التحكم في الموظفين 

@endsection


@section('header')

{!! Html::style('/maincontroller/plugins/datatables/dataTables.bootstrap.css') !!}
{!! Html::style('/css/bootstrap.min.css') !!}

@endsection




@section('content')

<link href="/search/bootstrap.min.css">

<script src="/search/jquery.min.js"></script>
<script src="/search/jquery.min.js"></script>


    <section class="content-header">
      <h1>
        التحكم بالموظفين 
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{ url('/adminpanel/employees')}}">التحكم بالموظفين </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">بيانات الموظفين </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="form-group">
            <input type="text" class="form-control" id="search" name="search" ></input>
              </div>
              <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>الاسم الاول</th>
                  <th>الكنية</th>
                  <th> الجوال</th>
                  
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
               <script type="text/javascript">
  
            $('#search').on('keyup',function(){
                $value=$(this).val(); 
                  $.ajax({
                    type : 'get',
                    url  : '{{URL::to('search')}}',
                    data : {'search':$value},
                    success:function(data){
                      $('tbody').html(data);
                    }
                  });   
              })
          </script>          <!-- /.box -->
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

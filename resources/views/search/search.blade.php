
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



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
                  <th>الجنسية</th>
                  <th> الراتب</th>
                  <th>مسموحيات الحسم</th>
                  <th>تعديل</th>
                  <th>حذف</th>
                  <th>تفاصيل</th>
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
                      //console.log(data);
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
   




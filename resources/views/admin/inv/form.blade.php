@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')

<script src="{{asset('jquery/jquery.js')}}"></script>
<script type="text/javascript">
 var s= 1 ; 
function totalamount()
{

  var t=0;
  $('.amount').each(function(i,e)
  {
    var amt = $(this).val()-0;
    t+=amt;
  });
  $('.total').html(t);
}
  $(function(){
    $('.add').click(function(){

      
      var product = $('.product_id').html();
      var n = ($('.body tr').length-0)+1;
      var tr = '<tr> <th class="no">'+n+'</th>'+
                '<td><select name="product_id[]" class="form-control product_id">'+product+'</select></td>'+
                '<td><input type="text" name="price[]" class="price form-control"></td>'+
                '<td><input type="text" name="qty[]" class="qty form-control"></td>'+
                '<td><input type="text" id="dis" name="dis[]" class="dis form-control"></td>'+
                '<td><input type="text" name="amount[]" class="amount form-control"></td>'+
                '<td><a href="#" class="btn btn-danger delete">Delete</a></td></tr>';

          $('.body').append(tr);
       
    

    });

    $('.body').delegate('.delete','click',function(){
      $(this).parent().parent().remove();
      totalamount();
    });

    $('.body').delegate('.product_id','change',function(){
     var tr = $(this).parent().parent();
     var unitprice = tr.find('.product_id option:selected').attr('data-price');
     tr.find('.price').val(unitprice);
     var qty = tr.find('.qty').val()-0;
     var dis = tr.find('.dis').val()-0;
     var price = tr.find('.price').val()-0;
     var total = (qty*price) - ((qty*price*dis)/100);
     tr.find('.amount').val(total);
     totalamount();

    });
    $('.body').delegate('.qty,.dis','keyup',function(){
       var tr = $(this).parent().parent();
       var qty = tr.find('.qty').val()-0;
       var dis = tr.find('.dis').val()-0;
       var price = tr.find('.price').val()-0;
        var total = (qty*price) - ((qty*price*dis)/100);
        tr.find('.amount').val(total);
        totalamount();
    });

     

  });



</script>
  <form action="{{action('InvoiceController@save')}}" method="post">
  <input type="hidden" name="_token" value="<?= csrf_token() ; ?>" >
  <table class="table">
    <tr>
                              <td> نوع الطلبية</td> <td> {!! Form::select("orderType",array('sell'=>"بيع") )!!} </td>
                            </tr>
                            <tr>
                              <td> رقم الفاتورة </td> <td> {!!  Form::text("id",null)!!} </td>
                              <td> تاريخ الفاتورة </td> <td> {!!  Form::date("orderDate",null)!!} </td>
                              <td> تاريخ الفاتورة </td> <td> {!!  Form::date("PaymentDate",null)!!} </td>

                            </tr>
                            <tr>
                              <td>اسم الموظف</td> <td>{!!  Form::select("employee_id",$employee)!!}</td>
                              <td> نوع الطلبية</td> <td> {!! Form::select("orderPayment",array('sell'=>"بيع") )!!} </td>
                               <td> نوع الطلبية</td> <td> {!! Form::select("orderRemainingPayment",array('sell'=>"بيع") )!!} </td>
                             
                            </tr>
                            <tr>

                            
                             <td>  نوع الدفع </td><td>{!!  Form::select("orderPaymentType",array('cash'=>'كاش','card'=>'كريدت كارت','tom'=>'آجل'))!!}</td>
                             
                             <tr>
                             <td> الموظف </td> 
                             <td>اسم الزبون</td> <td>{!!  Form::select("customer_id",$customer)!!}</td>
                            </tr>
                            
  </table>
  <input type="submit" value="Order" name="save" class="btn btn-primary">

  <table class="table table-bordered table-hover ">
    <thead>
      <th>N</th>
      <th>المادة</th>
      <th>السعر</th>
      <th>العدد</th>
      <th>الحسم</th>
      <th>الكمية</th>
      <th><input type="button" id="submit" class="btn btn-primary add" value="+"></th>
    </thead>
    <tbody class="body">
      <tr>
        <th class="no">1</th>
         <td><select  name="product_id[]" class="form-control product_id"  >
        <option selected="selected" > اختر مادة</option>
          <?php foreach ($data as $r) {
            ?>

            <option data-price="<?= $r->productNetPrice; ?>" value="<?= $r->id; ?>"> <?= $r->productName ?></option>
            <?php 
          }
          ?>
        </select>


        </td>
        <td><input type="text" name="price[]" class="price form-control"></td>
        <td><input type="text" name="qty[]" class="qty form-control"></td>
        <td><input type="text" id="dis" name="dis[]" class="dis form-control"></td>
        <td><input type="text" name="amount[]" class="amount form-control"></td>
        <td><a href="#" class="btn btn-danger delete">Delete</a></td>

        </td>
      </tr>
    </tbody>

    
    
  </table>
  </form>
  <tfoot>
      <th colspan="6">Total:<b class="total">0</b></th>
      
    </tfoot>



@endsection






@section('footer')
@endsection

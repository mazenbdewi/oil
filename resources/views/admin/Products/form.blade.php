


<table class="table" >

<tr>
 <td>نوع المادة</td> <td>
 {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

  </td> <br/>
 </tr>

 <tr>

 <td>رقم المادة</td> <td> {!!  Form::text("productCode",null)!!} </td> 
 <td>  اسم المادة </td> <td>{!!  Form::text("productName")!!}</td>
 <td> وصف المادة </td><td> {!!  Form::text("productDescription")!!} </td><br />
</tr>
 
 <tr>

 <td> السعر الصافي  </td><td>{!!  Form::text("productNetPrice")!!}</td>
 <td>  الكمية  </td><td>{!!  Form::text("productQuntity")!!}</td>
 <td> وحدة القياس</td><td> {!!  Form::text("productUnit")!!}</td>
  <td> سعر المبيع  </td><td>{!!  Form::text("productSellPrice")!!}</td>
</tr>
<tr>
<td> سعر الكمية الإجمالية </td> <td>{!!  Form::text("productTotalPrice")!!}</td>


</table>



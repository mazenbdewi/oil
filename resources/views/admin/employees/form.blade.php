


<table class="table table-bordered table-hover "  >

<tr>
 <td> الرتبة الوظيفية </td> <td>
 {!! Form::select('career_id', $careers, null, ['class' => 'form-control']) !!}

  </td> <br/>
 </tr>

 <tr>

 <td> الاسم الأول </td> <td> {!!  Form::text("employeeFirstName",null)!!} </td> <td>  اسم الأب </td> <td>{!!  Form::text("employeeMiddleName")!!}</td><td> الكنية </td><td> {!!  Form::text("employeeLastName")!!} </td><br />
</tr>
 
 <tr>

 <td> تاريخ الميلاد </td><td>{!!  Form::date("employeeBrithday")!!}</td><td>  ناريخ العمل  </td><td>{!!  Form::date("employeeFrom")!!}</td><td> تاريخ ترك العمل</td><td> {!!  Form::date("employeeTo")!!}</td>
</tr>
<tr>
<td> الجوال </td> <td>{!!  Form::text("employeeMobile")!!}</td><td>هاتف المنزل </td><td>{!!  Form::text("employeePhoneHome")!!}</td><td>هاتف العمل </td><td>{!!  Form::text("employeePhoneJob")!!}</td>

</tr>
<tr>
<td>العنوان </td><td>{!!  Form::text("employeeAddress")!!}</td><td>المدينة</td><td>{!!  Form::text("employeeCity")!!}</td><td>الجنسية</td><td>{!!  Form::text("employeeNational")!!}</td>
</tr>

<tr>
<td>الراتب</td><td>{!!  Form::text("employeeSalary")!!}</td><td>الحسم المسموح</td><td>{!!  Form::text("employeeDiscount")!!}</td>
</tr>


</table>



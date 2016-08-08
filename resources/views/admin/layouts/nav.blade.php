
 		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>



<!-- employees -->

         <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>بيانات اساسية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/careers')}}"><i class="fa fa-circle-o"></i>الرتب الوظيفية</a></li>
            <li class="active"><a href="{{ url('/adminpanel/employees/create')}}"><i class="fa fa-circle-o"></i>أضف موظف</a></li>
            <li><a href="{{ url('/adminpanel/employees')}}"><i class="fa fa-circle-o"></i> كل الموظفين</a></li>
          <li class="active"><a href="{{ url('/adminpanel/customers/create')}}"><i class="fa fa-circle-o"></i>أضف زبون</a></li>
            <li><a href="{{ url('/adminpanel/customers')}}"><i class="fa fa-circle-o"></i> كل الزبائن</a></li>
            <li class="active"><a href="{{ url('/adminpanel/providers/create')}}"><i class="fa fa-circle-o"></i>أضف مورد</a></li>
            <li><a href="{{ url('/adminpanel/providers')}}"><i class="fa fa-circle-o"></i> كل الموردين</a></li>

          </ul>
        </li>

<!--Product--> 

          <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>المواد</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/categories')}}"><i class="fa fa-circle-o"></i>اضافة نوع مادة</a></li>
            <li class="active"><a href="{{ url('/adminpanel/products/create')}}"><i class="fa fa-circle-o"></i>اضافة مادة</a></li>
            <li><a href="{{ url('/adminpanel/products')}}"><i class="fa fa-circle-o"></i> كل المواد</a></li>
          </ul>
        </li>

<!--Invoice--> 

          <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>الحركة اليومية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/inv/form')}}"><i class="fa fa-circle-o"></i>اضافة فاتورة</a></li>
            <li><a href="{{ url('/adminpanel/inv')}}"><i class="fa fa-circle-o"></i>'الفواتير'</a></li>
            <li><a href="{{ url('/adminpanel/accounts/create')}}"><i class="fa fa-circle-o"></i>'اضافة سند صرف'</a></li>
            <li><a href="{{ url('/adminpanel/accounts/')}}"><i class="fa fa-circle-o"></i>'سندات الصرف'</a></li>
            <li><a href="{{ url('/adminpanel/accounts/showCash')}}"><i class="fa fa-circle-o"></i>'حركة الصندوق'</a></li>

          </ul>
        </li>

<!--Finanshel--> 

          <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>تقارير مالية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/inv/form')}}"><i class="fa fa-circle-o"></i>مبيعات مندوب</a></li>
            <li><a href="{{ url('/adminpanel/inv')}}"><i class="fa fa-circle-o"></i>كشف حساب مورد</a></li>
            <li><a href="{{ url('/adminpanel/accounts/create')}}"><i class="fa fa-circle-o"></i>كشف حساب زبون</a></li>
            <li><a href="{{ url('/adminpanel/accounts/')}}"><i class="fa fa-circle-o"></i>حركة المبيعات</a></li>
            <li><a href="{{ url('/adminpanel/accounts/showCash')}}"><i class="fa fa-circle-o"></i>حركة المشتريات</a></li>
            <li><a href="{{ url('/adminpanel/accounts/showCash')}}"><i class="fa fa-circle-o"></i>حركة المواد</a></li>
            <li><a href="{{ url('/adminpanel/accounts/showCash')}}"><i class="fa fa-circle-o"></i>حساب الارباح و الخسائر</a></li>

          </ul>
        </li>

<!--Draw--> 

          <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>رسوم بيانية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/adminpanel/inv/form')}}"><i class="fa fa-circle-o"></i>مبيعات صنف</a></li>
            <li><a href="{{ url('/adminpanel/inv')}}"><i class="fa fa-circle-o"></i>مبيعات زبون</a></li>
            <li><a href="{{ url('/adminpanel/accounts/create')}}"><i class="fa fa-circle-o"></i>مشتريات مادة</a></li>
         
          </ul>
        </li>




          



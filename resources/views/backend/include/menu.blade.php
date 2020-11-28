<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" style="padding-top: 70px;">
      <div class="main-menu-content">
       <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item" ><a class="nav-link"  href="{{url('backend/dashboard')}}"  data-action="dashboard.index"> <i class="ft-home"></i><span class="menu-title" >االصفحه الرئيسيه</span></a>
            </li>
@if(\Session::get('backendUser') && \Session::get('backendUser')->type==1)


            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-camera"></i><span class="menu-title" >الصور </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/banner')}}" data-action="banner.index" > الصور
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >العملاء </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/users')}}" data-action="users.index" > العملاء
                        </a>
                    </li>

                </ul>
            </li>
             <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-navigation"></i><span class="menu-title" >أرسال الأشعارات </span></a>
                <ul class="menu-content">

                    <li ><a class="menu-item" href="{{url('backend/users_notification')}}" data-action="orders.index" >ارسال الأشعارات للمستخدمين
                        </a>
                    </li>




                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الاقسام </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/main_specialist')}}" data-action="categories.index" >  الأقسام الأساسية
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/volume')}}" data-action="categories.index" >  الاوزان
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/prepare')}}" data-action="prepare.index" >  طرق التحضير
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/filter')}}" data-action="categories.index" >  الفلاتر
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >المناطق </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/area')}}" data-action="area.index" >  المناطق
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/cities')}}" data-action="cities.index" >  المدن
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >المنتجات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/products')}}" data-action="products.index" > المنتجات
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >المتاجر </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/stores')}}" data-action="stores.index" >  المتاجر
                        </a>
                    </li>

                </ul>
            </li>



            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الطلبات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/allorders')}}" data-action="orders.index" > الطلبات
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/promocodes')}}" data-action="promocodes.index" > أكواد الخصم
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="fa fa-cogs"></i><span class="menu-title" >الاعدادات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/app_setting')}}" data-action="app_setting.index" > الاعدادات
                        </a>
                    </li>

                </ul>
            </li>
     @else

         <li class="nav-item" ><a class="nav-link"  href="{{url('backend/profile')}}"  data-action="dashboard.index"> <i class="ft-user"></i><span class="menu-title" >المعلومات الشخصيه</span></a>
            </li>
             <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >المنتجات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/storeproducts')}}" data-action="products.index" > المنتجات
                        </a>
                    </li>

                </ul>
            </li>
             <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الطلبات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/orders')}}" data-action="products.index" > الطلبات
                        </a>
                    </li>

                </ul>
            </li>
     @endif



        </ul>
      </div>
    </div>

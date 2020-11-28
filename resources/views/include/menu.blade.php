<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" style="padding-top: 70px;">
      <div class="main-menu-content">
       <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item" ><a class="nav-link"  href="{{url('backend/dashboard')}}"  data-action="dashboard.index"> <i class="ft-home"></i><span class="menu-title" >االصفحه الرئيسيه</span></a>
            </li>
@if(auth()->user()->hasRole('owner') || auth()->user()->hasRole('super_admin'))


            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-camera"></i><span class="menu-title" >الصور </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/banner')}}" data-action="banner.index" > الصور
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >العملاء </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/clients')}}" data-action="users.index" > العملاء
                        </a>
                    </li>

                </ul>
            </li>
             
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >المناطق </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/cities')}}" data-action="cities.index" > المدن
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/branches')}}" data-action="branches.index" > الفروع
                        </a>
                    </li>


                </ul>
            </li>


            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الاقسام </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/categories')}}" data-action="categories.index" >  الأقسام الأساسية
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/subcategories')}}" data-action="subcategories.index" >  الأقسام الفرعية
                        </a>
                    </li>


                </ul>
            </li>


            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >العروض </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/offers')}}" data-action="offers.index" > العروض
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('offersslider/edit')}}" data-action="offersslider.index" > سلايدر العروض
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/ouroffers')}}" data-action="ouroffers.index" > عروضنا
                        </a>
                    </li>
                </ul>
            </li>
            
            
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >المنتجات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/products')}}" data-action="products.index" > المنتجات
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('newproducts/edit')}}" data-action="newproducts.index" > أحدث المنتجات
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الطلبات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/orders')}}" data-action="orders.index" > الطلبات
                        </a>
                    </li>
                    <li ><a class="menu-item" href="{{url('backend/coupons')}}" data-action="coupons.index" > أكواد الخصم
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الوحدات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/units')}}" data-action="units.index" > الوحدات
                        </a>
                    </li>

                </ul>
            </li>
            
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-navigation"></i><span class="menu-title" > الاعدادات </span></a>
                <ul class="menu-content">

                    <li ><a class="menu-item" href="{{url('backend/about')}}" data-action="about.edit" >من نحن
                        </a>
                    </li>
                    
                     <li ><a class="menu-item" href="{{url('backend/contacts')}}" data-action="contacts.index" > تواصل معنا
                        </a>
                    </li>
                    
                    <li ><a class="menu-item" href="{{url('backend/privacy')}}" data-action="contacts.index" >  الخصوصية
                        </a>
                    </li>

                </ul>
            </li>


            <!-- <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="fa fa-cogs"></i><span class="menu-title" >الاعدادات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/app_setting')}}" data-action="app_setting.index" > الاعدادات
                        </a>
                    </li>

                </ul>
            </li> -->
     @else

             <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >المنتجات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/products')}}" data-action="products.index" > المنتجات
                        </a>
                    </li>


                </ul>
            </li>
             <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الطلبات </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/orders')}}" data-action="orders.index" > الطلبات
                        </a>
                    </li>

                </ul>
            </li>



     @endif





        </ul>
      </div>
    </div>

<div class="main-menu menu-fixed menu-light menu-accordion"data-scroll-to-active="true" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top:65px;">
    <div class="main-menu-content" style=" width: 210px;">
       <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
@if(\Session::get('backendUser')->type==1)
            <li class="nav-item" ><a class="nav-link"  href="{{url('backend/dashboard')}}"  data-action="dashboard.index"> <i class="ft-home"></i><span class="menu-title" >Dashboard</span></a>
            </li>
     

           
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >العملاء </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/users')}}" data-action="users.index" > العملاء
                        </a>
                    </li> 
                  
                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الاقسام </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/main_specialist')}}" data-action="categories.index" >  الأقسام الأساسية 
                        </a>
                    </li> 
                    
                </ul>
            </li>
            <li class="nav-item has-sub" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" ><i class="ft-home"></i><span class="menu-title" >الموردين </span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="{{url('backend/stores')}}" data-action="stores.index" >  الموردين
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
     @else
         <li class="nav-item" ><a class="nav-link"  href="{{url('backend/dashboard')}}"  data-action="dashboard.index"> <i class="ft-home"></i><span class="menu-title" >Dashboard</span></a>
            </li>
         <li class="nav-item" ><a class="nav-link"  href="{{url('backend/profile')}}"  data-action="dashboard.index"> <i class="ft-home"></i><span class="menu-title" >Profile</span></a>
            </li>
     @endif

       
        </ul>
          <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
          <div class="ps__rail-y" style="top: 0px; height: 364px; left: 233px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 64px;"></div></div>
          
      </div>
          
</div>
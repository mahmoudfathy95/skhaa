
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="{{url('backend/dashboard')}}"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="{url('backend/dashboard')}}"><img class="brand-logo" style="height: 100px; " alt="stack admin logo" src="{{url('logo.png')}}">
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">

            <ul class="nav navbar-nav float-right">


            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:;" data-toggle="dropdown"><span class="avatar avatar-online"><img src="{{url('logo.png')}}" alt="avatar"><i></i></span><span class="user-name">{{auth()->user()->name}}</span></a>
                      <div class="dropdown-menu dropdown-menu-right">
                          @if(auth()->user()->hasRole('owner'))
                            <a class="dropdown-item" href="{{url('users/editAdmin')}}"><i class="ft-user"></i> تعديل البيانات</a>
                          @else
                            <a class="dropdown-item" href="{{url('users/showUser')}}"><i class="ft-user"></i> المعلومات الشخصيه</a>
                            <a class="dropdown-item" href="{{url('users/editUser')}}"><i class="ft-star"></i> تعديل البيانات </a>      
                          @endif

                          @if(auth()->user()->hasRole('owner'))
                            <a class="dropdown-item" href="{{url('backend/users')}}"><i class="ft-star"></i> المستخدمين</a>

                          @endif

                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{url('backend/logout')}}"><i class="ft-power"></i> الخروج</a>
                </div>
                    </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- END: Header-->

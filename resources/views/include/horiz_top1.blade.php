<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
        <!-- include ../../../includes/mixins-->
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link"  href="{{url('backend/dashboard')}}"  data-action="dashboard.index"> <i class="ft-home"></i><span>Dashboard</span></a>

            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-list"></i><span>Home Settings</span></a>

                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item" href="{{url('backend/banners')}}" data-action="banners.index" data-toggle="dropdown">Banners
                            <submenu class="name"></submenu></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="{{url('backend/testimonials')}}" data-action="testimonials.index" data-toggle="dropdown">Testimonials
                            <submenu class="name"></submenu></a>
                    </li>
        </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-list"></i><span>Courses</span></a>
            <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/coursescategories')}}" data-action="coursesCategories.index" data-toggle="dropdown">Courses Categories
                        <submenu class="name"></submenu></a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/courses')}}" data-action="courses.index" data-toggle="dropdown">Courses
                        <submenu class="name"></submenu></a>
                </li>
            </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-shopping-cart"></i><span>Products</span></a>
            <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/services')}}" data-action="services.index" data-toggle="dropdown">Services
                        <submenu class="name"></submenu></a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/applications')}}" data-action="applications.index" data-toggle="dropdown">Applications
                        <submenu class="name"></submenu></a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/partners')}}" data-action="partners.index" data-toggle="dropdown">Partners</a></li>
            </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-ft-server"></i><span>Careers</span></a>
            <ul class="dropdown-menu">

                <li data-menu=""><a class="dropdown-item" href="{{url('backend/careers')}}" data-action="careers.index" data-toggle="dropdown">Careers
                        <submenu class="name"></submenu></a>
                </li>
            </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-camera"></i><span>Events</span></a>
            <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/events')}}" data-action="events.index" data-toggle="dropdown">Events
                        <submenu class="name"></submenu></a>
                </li>
            </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-phone-call"></i><span>News</span></a>
            <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/news')}}" data-action="news.index"  data-toggle="dropdown">News
                        <submenu class="name"></submenu></a>
                </li>
            </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-home"></i><span>Static Pages </span></a>
            <ul class="dropdown-menu">
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/staticpages')}}" data-action="staticpages.index" data-toggle="dropdown"> Static Pages 
                        <submenu class="name"></submenu></a>
                </li> 
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/branches')}}" data-action="branches.index" data-toggle="dropdown"> branches
                        <submenu class="name"></submenu></a>
                </li> 
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/workingtimes')}}" data-action="workingtimes.index" data-toggle="dropdown"> workingtimes
                        <submenu class="name"></submenu></a>
                </li> 
            </ul>
        </li>

        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-mail"></i><span>Contacts</span></a>
            <ul class="dropdown-menu">


                <li data-menu=""><a class="dropdown-item" href="{{url('backend/contacts')}}" data-action="contacts.index"  data-toggle="dropdown">Contacts
                        <submenu class="name"></submenu></a>
                </li>


            </ul>
        </li>






        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="javascript:;" data-toggle="dropdown"><i class="ft-settings"></i><span>Site Settings</span></a>
            <ul class="dropdown-menu">


                <li data-menu=""><a class="dropdown-item" href="{{url('backend/settings?ids=12,13,14,15,16,17,18')}}" data-action="returns.index" data-toggle="dropdown">Settings
                        <submenu class="name"></submenu></a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/backend_users')}}" data-action="users.create" data-toggle="dropdown">Admins
                        <submenu class="name"></submenu></a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="{{url('backend/languages')}}" data-action="languages.index" data-toggle="dropdown">Languages
                        <submenu class="name"></submenu></a>
                </li>



            </ul>
        </li>
        </ul>
    </div>
    <!-- /horizontal menu content-->
</div>
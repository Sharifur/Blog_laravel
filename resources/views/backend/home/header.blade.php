<header class="main-header">
    <style> 
        .box-footer {
            background-color: transparent;
        }
    </style>
    <!-- Logo -->
    <a href="{{route('admin.dashboard')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Vougish</b>Blog</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Vougish</b>Blog</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{App\Contact::where('status',0)->count()}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{App\Contact::where('status',0)->count()}} New messages</li>
                        <li class="footer"><a href="{{route('msg.seen')}}">See All Messages</a></li>
                    </ul>
                </li>
                <li><a href="{{url('/')}}" target="_blank">View BLog</a></li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li><a href="{{ route('admin.logout') }}" 
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" 
                       >Log out</a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
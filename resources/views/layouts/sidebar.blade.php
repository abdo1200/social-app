<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">



    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <ul class="list-group">
            <a href=" {{ url('/profile',Auth()->user()->id) }} " class="bg-dark row list-group-item list-group-item-action" style="height: 70px">
                <img src=" {{ url('img',Auth()->user()->image) }} " width="40" height="40" class="mt-1 ml-1 rounded-circle" alt="">
                    <span class="text-light menu-collapsed ml-2" style="font-size: 15px">
                        {{ substr(Auth()->user()->name, 0, 10).'...' }} <div class="rounded-circle bg-success" style="margin-left: 5px;height: 10px;width: 10px;display: inline-block"></div>
                    </span>

            </a>
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed"> <small>MAIN MENU</small> </li>
            <!-- <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center"> <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span> <span class="submenu-icon ml-auto"></span> </div>
            </a>
            <div id='submenu1' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"> <span class="menu-collapsed">Charts</span> </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"> <span class="menu-collapsed">Reports</span> </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"> <span class="menu-collapsed">Tables</span> </a>
            </div> -->
            <a href="{{ url('/profile',Auth()->user()->id) }} " class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center"> <span class="text-success fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span> </div>
            </a>
            <a href="{{ url('/friends') }}" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center"> <span class="text-success fa fa-user-friends fa-fw mr-3"></span>
                    <span class="menu-collapsed">Friends <span class="badge badge-pill badge-success ml-2"> {{ $friends->count() }} </span></span></div>
            </a>
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center"> <span class="text-success fa fa-calendar fa-fw mr-3"></span>
                    <span class="menu-collapsed">pages</span> </div>
            </a>
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center"> <span class="text-success fa fa-users fa-fw mr-3"></span>
                    <span class="menu-collapsed">Groups</span>
                </div>
            </a>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center"> <span class="text-success fas fa-sign-out-alt fa-fw mr-3"></span>
                    <span class="menu-collapsed">Logout</span> </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center"> <span id="collapse-icon" class="text-success fa fa-2x mr-3"></span> <span id="collapse-text" class="menu-collapsed">Collapse</span> </div>
            </a>
        </ul>
        <!-- List Group END-->
    </div>



<script src="{{ asset('js/sidebar.js') }}"></script>

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Bio Green Technology</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->

    @php

        $role = $user->role;
    @endphp
    <ul class="metismenu" id="menu">

        <li>
            <a href="{{ route('home') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-map-pin'></i>
                </div>
                <div class="menu-title">Farm Management</div>
            </a>
            <ul>
                <li> <a href="{{ route('add.farm') }}"><i class="bx bx-right-arrow-alt"></i>Add Farm</a>
                </li>
                <li> <a href="{{ route('all.farms') }}"><i class="bx bx-right-arrow-alt"></i>View Farms</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-map-pin'></i>
                </div>
                <div class="menu-title">Pond Management</div>
            </a>
            <ul>
                <li> <a href="{{route('add.pond')}}"><i class="bx bx-right-arrow-alt"></i>Add Pond</a>
                </li>
                <li> <a href="{{ route('all.ponds') }}"><i class="bx bx-right-arrow-alt"></i>View Ponds</a>
                </li>
            </ul>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-map-pin'></i>
                </div>
                <div class="menu-title">Video Management</div>
            </a>
            <ul>
                <li> <a href="{{route('add.video')}}"><i class="bx bx-right-arrow-alt"></i>Add Video</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>View Videos</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-map-pin'></i>
                </div>
                <div class="menu-title">Febi Management</div>
            </a>
            <ul>
                <li> <a href="{{route('add.febi')}}"><i class="bx bx-right-arrow-alt"></i>Add Febi</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>View Febis</a>
                </li>
            </ul>
        </li>




        <li>
            <a href="{{route('all.users')}}">
                <div class="parent-icon"><i class='bx bx-user-pin'></i>
                </div>
                <div class="menu-title">User Management</div>
            </a>
        </li>


        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <div class="parent-icon">
                    <i class="bx bx-log-out"></i>
                </div>&nbsp;&nbsp;
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </li>
    </ul>
    <!--end navigation-->
</div>

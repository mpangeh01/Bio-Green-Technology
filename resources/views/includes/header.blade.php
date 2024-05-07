<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class="bx bx-menu"></i></div>


            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">

                    <li class="nav-item dropdown dropdown-large" style="display: none;">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-category"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="row row-cols-3 g-3 p-3">

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large" style="display: none;">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">7</span>
                            <i class="bx bx-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">

                            </a>
                            <div class="header-notifications-list">

                            </div>

                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large" style="display: none;">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">8</span>
                            <i class="bx bx-comment"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">

                            </a>
                            <div class="header-message-list">


                            </div>

                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <!--<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar" />-->


                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ $user->name }}</p>
                        <p class="designattion mb-0">{{ $user->role }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">


                    <li>
                        <a class="dropdown-item" href=""><i
                                class="bx bx-home-circle"></i><span>Profile</span></a>
                    </li>


                    <li>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">

                            <i class="bx bx-log-out"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>




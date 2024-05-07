<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/abaleya.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Abaleya</h4>
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
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">DashBoard</div>
            </a>
            <ul>
                <li> <a href="{{ route('home') }}"><i class="bx bx-right-arrow-alt"></i>Home</a>
                </li>
                <li> <a href="{{ route('revenue') }}"><i class="bx bx-right-arrow-alt"></i>Revenue</a>
                </li>
                <li> <a href="{{ route('accrued') }}"><i class="bx bx-right-arrow-alt"></i>Accrued Earnings</a>
                </li>
            </ul>
        </li>

        @if ($role !== 'Admin' && $role !== 'Dispatcher')
        @else
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-map-pin'></i>
                    </div>
                    <div class="menu-title">Location Management</div>
                </a>
                <ul>
                    <li> <a href="{{ route('add.location') }}"><i class="bx bx-right-arrow-alt"></i>Add Location</a>
                    </li>
                    <li> <a href="{{ route('all.locations') }}"><i class="bx bx-right-arrow-alt"></i>View Locations</a>
                    </li>
                </ul>
            </li>


            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-dollar-circle"></i>
                    </div>
                    <div class="menu-title">Route Management</div>
                </a>
                <ul>
                    <li> <a href="{{ route('add.fare') }}"><i class="bx bx-right-arrow-alt"></i>Add New Route</a>
                    </li>
                    <li> <a href="{{ route('all.fares') }}"><i class="bx bx-right-arrow-alt"></i>View Route</a>
                    </li>


                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-gift'></i>
                    </div>
                    <div class="menu-title">Car Make <br> Management</div>
                </a>
                <ul>
                    <li> <a href="{{ route('add.make') }}"><i class="bx bx-right-arrow-alt"></i>Add New Make</a>
                    </li>

                    <li> <a href="{{ route('all.makes') }}"><i class="bx bx-right-arrow-alt"></i>View All Makes</a>
                    </li>




                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-command'></i>
                    </div>
                    <div class="menu-title">Car Type <br> Management</div>
                </a>
                <ul>
                    <li> <a href="{{ route('add.type') }}"><i class="bx bx-right-arrow-alt"></i>Add New Type</a>
                    </li>
                    <li> <a href="{{ route('all.types') }}"><i class="bx bx-right-arrow-alt"></i>View All Types</a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-gift'></i>
                    </div>
                    <div class="menu-title">Car Model <br> Management</div>
                </a>
                <ul>

                    <li> <a href="{{ route('add.model') }}"><i class="bx bx-right-arrow-alt"></i>Add New Model</a>
                    </li>

                    <li> <a href="{{ route('all.models') }}"><i class="bx bx-right-arrow-alt"></i>View All Models</a>
                    </li>




                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"> <i class='bx bx-atom'></i>
                    </div>
                    <div class="menu-title">Car Management</div>
                </a>
                <ul>
                    <li> <a href="{{ route('all.cars') }}"><i class="bx bx-right-arrow-alt"></i>View All Cars</a>
                    </li>
                    <li> <a href="{{ route('unapproved.cars') }}"><i class="bx bx-right-arrow-alt"></i>View Unapproved
                            Cars </a>
                    </li>
                    <li> <a href="{{ route('approved.cars') }}"><i class="bx bx-right-arrow-alt"></i>View Approved
                            Cars</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-hourglass'></i>
                    </div>
                    <div class="menu-title">Listing <br> Management</div>
                </a>
                <ul>
                    <li> <a href="{{ route('all.listings') }}"><i class="bx bx-right-arrow-alt"></i>View All
                            Listings</a>
                    </li>
                    <li> <a href="{{ route('unapproved.listings') }}"><i class="bx bx-right-arrow-alt"></i>View
                            Unapproved Listings</a>
                    </li>
                    <li> <a href="{{ route('approved.listings') }}"><i class="bx bx-right-arrow-alt"></i>View Approved
                            Listings</a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                    </div>
                    <div class="menu-title">Booking Management</div>
                </a>
                <ul>
                    <li> <a href="{{ route('all.bookings') }}"><i class="bx bx-right-arrow-alt"></i>View All
                            Bookings</a>
                    </li>

                    <li> <a href="{{ route('approved.bookings') }}"><i class="bx bx-right-arrow-alt"></i>View Approved
                            Bookings</a>
                    </li>

                    <li> <a href="{{ route('unapproved.bookings') }}"><i class="bx bx-right-arrow-alt"></i>View
                            Unapproved Bookings</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="{{ route('all.users') }}">
                    <div class="parent-icon"><i class='bx bx-user-pin'></i>
                    </div>
                    <div class="menu-title">User Management</div>
                </a>
            </li>
        @endif


        @if ($role !== 'Admin' && $role !== 'Accountant')
        @else
            <li>
                <a href="{{ route('fare.factor') }}">
                    <div class="parent-icon"><i class='bx bx-error'></i></div>
                    <div class="menu-title">Fare Factor Management</div>
                </a>
            </li>

            <li>
                <a href="{{ route('percent') }}">
                    <div class="parent-icon"><i class='bx bx-error'></i>
                    </div>
                    <div class="menu-title">Listing Percentage</div>
                </a>
            </li>
        @endif



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

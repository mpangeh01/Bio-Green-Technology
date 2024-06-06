<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor1">


<head>
    @include('includes.css')

    <title>Bio Green Tech | Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('includes.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('includes.header')
        @php

            $role = $user->role;
        @endphp
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <div class="row row-cols-1 row-cols-lg-4">
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Total Users</p>
                                        <h5 class="mb-0 text-white">{{ $totalUsers }}</h5>
                                    </div>
                                    <div class="ms-auto text-white"><i class='bx bx-cart font-30'></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-burning">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Total Farmers</p>
                                        <h5 class="mb-0 text-white">{{ $totalFarms }}</h5>
                                    </div>
                                    <div class="ms-auto text-white"><i class='bx bx-wallet font-30'></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Total Ponds</p>
                                        <h5 class="mb-0 text-white">{{ $totalPonds }}</h5>
                                    </div>
                                    <div class="ms-auto text-white"><i class='bx bx-bulb font-30'></i>
                                    </div>
                                </div>
                                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-gradient-moonlit">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Videos</p>
                                        <h5 class="mb-0 text-white">{{ $totalVideos }}</h5>
                                    </div>
                                    <div class="ms-auto text-white"><i class='bx bx-chat font-30'></i>
                                    </div>
                                </div>
                                <div class="progress  bg-white-2 radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div>
                    <h3>
                        Top Performing Farms(This Month)
                    </h3>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Farmer</th>
                                        <th>Farm Name</th>
                                        <th>Percentage Increase</th>

                                    </tr>
                                </thead>
                                <tbody id="transactionTableBody"></tbody>
                                <tfoot>
                                    <tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Farmer</th>
                                            <th>Farm Name</th>
                                            <th>Percentage Increase</th>

                                        </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->
    <!--start switcher-->

    <!--end switcher-->
    <!-- Bootstrap JS -->

    @include('includes.js')

</body>


</html>

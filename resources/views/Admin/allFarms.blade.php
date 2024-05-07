<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor1">


<head>
    @include('includes.css')
    <title>Bio Green Tech – Admin Dashboard</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('includes.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('includes.header')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Farm Management System</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="index3.html"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Fares</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->

                @if (session('status'))
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 ">{{ session('status') }}</h6>

                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h6 class="mb-0 text-uppercase">Farms</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Farm Name</th>
                                        <th>Farm Owner</th>
                                        <th>Address</th>
                                        <th>Farm Email</th>
                                        <th>Farm phone</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($farms as $farm)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $farm->name }}</td>
                                            <td>{{ $farm->user->f_name }}&nbsp;&nbsp; {{ $farm->user->f_name }}</td>
                                            <td>{{ $farm->address }}</td>
                                            <td>{{ $farm->user->email }}</td>
                                            <td>{{ $farm->user->phone}}</td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('edit.farm', ['id' => $farm->id]) }}"
                                                        class=""><i class='bx bxs-edit'></i></a>
                                                    <a href="{{ route('delete.farm', ['id' => $farm->id]) }}"
                                                        class="ms-3"
                                                        onclick="return confirm('Are You Sure You Want To Delete This Fare?');"
                                                        style="color: red"><i class='bx bxs-trash'></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Number</th>
                                        <th>Farm Name</th>
                                        <th>Farm Owner</th>
                                        <th>Address</th>
                                        <th>Farm Email</th>
                                        <th>Farm phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->

        </div>
        <!--end wrapper-->
        <!--start switcher-->
        @include('includes.footer')
        <!--end switcher-->
        <!-- Bootstrap JS -->
        @include('includes.js')


</body>

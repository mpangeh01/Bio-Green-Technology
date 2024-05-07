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
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Farm Management</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Farm</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">

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


                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add New Farm</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">

                                        <form action="{{ route('store.farm') }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">User</label>
                                                <select name="user" class="form-select form-select-sm mb-3"
                                                    aria-label=".form-select-sm example" id="origin">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->f_name }}&nbsp;&nbsp;{{ $user->l_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Shield Farms Limited" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address"
                                                    placeholder="Kamwala South 29793" required>
                                            </div>



                                            <div class="mb-3">
                                                <label class="form-label">Region</label>
                                                <input type="text" class="form-control" name="region"
                                                    placeholder="Lusaka" required>
                                            </div>


                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-outline-primary"
                                                    style="width: 100%">Add Farm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div><!--end row-->
                        </div>
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

    <!--end switcher-->
    <!-- Bootstrap JS -->
    @include('includes.js')

</body>

<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor1">


<head>
    <base href="/public">
    @include('includes.css')
    <title>Abaleya – Admin Dashboard</title>
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
                    <div class="breadcrumb-title pe-3">User Profile</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">

                        </div>
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

                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="Profile Images/{{ $pickedUser->picture }}" alt="Admin"
                                                class="rounded-circle p-1 bg-primary" width="110">
                                            <div class="mt-3">
                                                <h4>{{ $pickedUser->f_name }} {{ $pickedUser->l_name }}</h4>
                                                <p class="text-secondary mb-1">{{ $pickedUser->role }}</p>
                                            </div>
                                        </div>
                                        <hr class="my-4" />

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('update.user', $pickedUser->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">First Name : </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="f_name"
                                                        value="{{ $pickedUser->f_name }}" required />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Last Name : </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="l_name"
                                                        value="{{ $pickedUser->l_name }}" required />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email :</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $pickedUser->email }}" required />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Phone:</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="tel" class="form-control" name="phone"
                                                        value="{{ $pickedUser->phone }}" required />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Profile Picture :</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="file" class="form-control" name="dp"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Date Joined : </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" value="{{ $pickedUser->created_at }}" readonly />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Role </h6>
                                                </div>

                                                <div class="col-sm-9 text-secondary">
                                                    <select name="role" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" id="origin">
                                                        <option value="Admin" {{ $pickedUser->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="Farmer" {{ $pickedUser->role === 'Farmer' ? 'selected' : '' }}>Farmer</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0"></h6>
                                                </div>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-primary btn-block"
                                                        style="width: 100%; margin: 15px, 15px, 15px, 15px">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

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

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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-xl-2">
                                        <div>
                                            <p>

                                            <h5>COLOR: {{ $car->color }} <br>PLATE NUMBER: {{ $car->plate_number }}
                                                <br> YEAR: {{ $car->year }} <br> MODEL: {{ $car->carModel->name }}
                                                <br> DRIVER : {{ $car->user->name }} <br> PHONE: {{ $car->user->phone }}
                                            </h5>
                                            </p>
                                        </div>

                                        @if ($car->is_approved == false)
                                            <a href="{{ route('approve.car', ['id' => $car->id]) }}"
                                                class="btn btn-success mb-3 mb-lg-0">Approve</a>
                                            <a href="ecommerce-add-new-products.html"
                                                class="btn btn-danger mb-3 mb-lg-0">Decline</a>
                                        @else
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <br><br>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                    <div class="col">
                        <div class="card">
                            <img src="Driver Credentials/{{ $car->user->driverCredentials->licence_back }}"
                                class="card-img-top" alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Licence Back</h6>


                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="Driver Credentials/{{ $car->user->driverCredentials->license_front }}"
                                class="card-img-top" alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Licence Front</h6>


                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="Driver Credentials/{{ $car->user->driverCredentials->with_license }}"
                                class="card-img-top" alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Driver With Licence</h6>


                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="Legal Documents/{{ $car->legalDocuments->insurance }}" class="card-img-top"
                                alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Insurance</h6>


                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="Legal Documents/{{ $car->legalDocuments->road_tax }}" class="card-img-top"
                                alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Road Tax</h6>


                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="Legal Documents/{{ $car->legalDocuments->fitness }}" class="card-img-top"
                                alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Fitness</h6>


                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card">
                            <img src="Legal Documents/{{ $car->legalDocuments->white_book }}" class="card-img-top"
                                alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">White Book</h6>


                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="CarImages/{{ $car->images->front }}" class="card-img-top" alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Car Front</h6>


                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card">
                            <img src="CarImages/{{ $car->images->back }}" class="card-img-top" alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Car Back</h6>


                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card">
                            <img src="CarImages/{{ $car->images->right }}" class="card-img-top" alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Car Right</h6>


                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card">
                            <img src="CarImages/{{ $car->images->left }}" class="card-img-top" alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Car Left</h6>


                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="CarImages/{{ $car->images->front_interior }}" class="card-img-top"
                                alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Front Interior</h6>


                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="CarImages/{{ $car->images->rear_interior }}" class="card-img-top"
                                alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Rear Interior</h6>


                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="CarImages/{{ $car->images->open_boot }}" class="card-img-top" alt="...">
                            <br>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">Open Boot</h6>


                            </div>
                        </div>
                    </div>
                </div><!--end row-->


            </div>
        </div>
        <!--end wrapper-->
        <!--start switcher-->
        @include('includes.footer')
        <!--end switcher-->
        <!-- Bootstrap JS -->
        @include('includes.js')


</body>

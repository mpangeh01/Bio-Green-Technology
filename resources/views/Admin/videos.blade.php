<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor1">

<head>
    @include('includes.css')
    <title>Bio Green Tech – Admin Dashboard</title>
    <style>
        .video-card {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            margin: 10px;
            width: calc(33% - 20px);
            /* Adjust width and margin for 3 cards per row */
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .video-thumbnail {
            width: 100%;
            height: 180px;
            background-size: cover;
            background-position: center;
            border-radius: 4px;
            cursor: pointer;
        }

        .video-title {
            font-size: 16px;
            margin: 10px 0;
            font-weight: bold;
            text-align: center;
        }

        .video-description {
            font-size: 14px;
            color: #555;
            text-align: center;
        }

        .video-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 180px;
            margin-bottom: 10px;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            border-radius: 4px;
        }
    </style>
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
                    <div class="breadcrumb-title pe-3">Video Management</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Videos</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <!-- Add any additional controls here -->
                    </div>
                </div>
                <!--end breadcrumb-->

                <!-- Video Grid -->
                <div class="video-grid">
                    @foreach ($videos as $video)
                    <div class="video-card">
                        <div class="video-container">
                            <video controls>
                                <source src="{{ asset('storage/' . $video->name) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="video-title">{{ $video->title }}</div>
                        <div class="video-description">This is a description of {{ $video->title }}.</div>
                    </div>
                    @endforeach
                </div>
                <!-- End Video Grid -->

            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <!--end switcher-->
    <!-- Bootstrap JS -->
    @include('includes.js')

</body>

</html>

<!DOCTYPE html>
<html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor1">
<head>
    @include('includes.css')
    <title>Bio Green Tech – Admin Dashboard</title>
</head>
<body>
    <div class="wrapper">
        @include('includes.sidebar')
        @include('includes.header')
        <div class="page-wrapper">
            <div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Febi Management</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="index3.html"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Febis</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                @if (session('status'))
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i></div>
                        <div class="ms-3">
                            <h6 class="mb-0 ">{{ session('status') }}</h6>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h6 class="mb-0 text-uppercase">Febis</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="febis-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Identifier</th>
                                        <th>Temperature</th>
                                        <th>Humidity</th>
                                        <th>Turbidity</th>
                                        <th>Dissolved Oxygen</th>
                                        <th>pH</th>
                                        <th>Pond Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach ($febis as $febi)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $febi->identifier }}</td>
                                        <td>{{ $febi->temperature }}</td>
                                        <td>{{ $febi->humidity }}</td>
                                        <td>{{ $febi->turbidity }}</td>
                                        <td>{{ $febi->dissolved_oxygen }}</td>
                                        <td>{{ $febi->ph }}</td>
                                        <td>{{ $febi->pond->name }}</td>
                                    </tr>
                                    @php $count++; @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Number</th>
                                        <th>Identifier</th>
                                        <th>Temperature</th>
                                        <th>Humidity</th>
                                        <th>Turbidity</th>
                                        <th>Dissolved Oxygen</th>
                                        <th>pH</th>
                                        <th>Pond Name</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>
    <script>
        $(document).ready(function() {
            $('#febis-table').DataTable();
        });
        </script>
    @include('includes.footer')
    @include('includes.js')
</body>
</html>

<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor1">


<head>
    @include('includes.css')

    <title>Abaleya | Admin Dashboard</title>
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


                @if ($role !== 'Admin' && $role !== 'Acountant')
                    <!-- So this basically shows the blank page for the Dispatcher Account-->
                    <br>
                    <h6 class="mb-0 text-uppercase">Only Admins Are See the Information on Page</h6>
                    <hr />
                @else
                    <br><br>
                    <div class="card">
                        <div class="col-xl-9 mx-auto">
                            <br>
                            <h6 class="mb-0 text-uppercase">Transaction Summary</h6>
                            <hr />
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Pick FROM Date</label>
                                        <input type="date" id="from_date" class="form-control datepicker" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pick TO Date</label>
                                        <input type="date" id="to_date" class="form-control datepicker" />
                                    </div>
                                </div>
                            </div>
                            <button type="button" style="width: 100%" class="btn btn-primary" id="getDataBtn">Get
                                Data</button>
                        </div>
                        <br><br><br>
                        <div style="margin: auto; width:100%; text-align: center;">
                            <h2 id="totalRevenue">
                                Total Revenue : ZMW 00
                            </h2>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Transaction ID</th>
                                                <th>Listing Owner</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="transactionTableBody"></tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Transaction ID</th>
                                                <th>Listing Owner</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!--end row-->

                <!--end row-->


                <!--end row-->


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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var table; // Define table variable outside the click event handler

            // Handle button click
            $('#getDataBtn').click(function() {
                var fromDate = $('#from_date').val();
                var toDate = $('#to_date').val();

                // Convert date formats
                var formattedFromDate = new Date(fromDate);
                var formattedToDate = new Date(toDate);

                // Format dates as YYYY-MM-DD
                var fromDateFormatted = formattedFromDate.toISOString().split('T')[0];
                var toDateFormatted = formattedToDate.toISOString().split('T')[0];

                // Destroy existing DataTable if initialized
                if ($.fn.DataTable.isDataTable('#example')) {
                    $('#example').DataTable().destroy();
                }

                // Initialize DataTable
                table = $('#example').DataTable({
                    columns: [{
                            data: null
                        }, // Placeholder for ID column
                        {
                            data: 'transaction_id'
                        },
                        {
                            data: 'listingOwner'
                        },
                        {
                            data: 'amount'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'created_at'
                        }
                    ],
                    columnDefs: [{
                        targets: 0, // Target the first column (ID column)
                        render: function(data, type, row, meta) {
                            // Render sequential number as ID
                            return meta.row + 1;
                        }
                    }]
                });

                // Make AJAX request to fetch data from server
                $.ajax({
                    type: 'GET', // Set the type to GET
                    url: "{{ url('/transactions') }}?from_date=" + fromDateFormatted + "&to_date=" +
                        toDateFormatted,

                    success: function(response) {
                        // Populate table with fetched data
                        table.rows.add(response.transactions).draw();

                        // Filter successful transactions
                        var successfulTransactions = response.transactions.filter(function(
                            transaction) {
                            return transaction.status === 'Success';
                        });

                        // Calculate total revenue for successful transactions
                        var totalRevenue = successfulTransactions.reduce(function(total,
                            transaction) {
                            return total + parseFloat(transaction.amount);
                        }, 0);

                        // Display total revenue
                        $('#totalRevenue').text('Total Revenue: ZMW ' + totalRevenue.toFixed(
                        2));
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            });
        });
    </script>




    @include('includes.js')

</body>


</html>

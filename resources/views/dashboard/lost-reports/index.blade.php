@extends('layouts.dashboard')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="lostReportDatatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('page_level_script')
    @include('dashboard.found-reports._shared')
    <script>
            $(document).ready(function($) {
                let table = $('#lostReportDatatable').DataTable({
                    "serverSide": true,
                    "ajax": {
                        "url": BASE_URL + '/dashboard/lost-reports',
                        "dataType": "json",
                        "type": "GET",
                        "data": {
                            "_token": CSRF_TOKEN
                        },
                        "tryCount" : 0,
                        "retryLimit" : 3,
                        error: function(xhr, ajaxOptions, thrownError) {
                        }
                    },
                    "columns": [{
                            "data": "item_name",
                        },
                        {
                            "data": "brand"
                        },
                        {
                            "data": "category"
                        },
                        {
                            "data": "created_at"
                        },
                        {
                            "data": "action",
                            "searchable": false,
                            "orderable": false
                        }
                    ],
                    "rowId": 'id',
                    "order": [
                        [0, "asc"]
                    ],
                    "lengthMenu": [
                        [25, 50, 100, 500],
                        [25, 50, 100, 500]
                    ],
                    "pageLength": 25,
                    "deferRender": true,
                    fixedHeader: true,
                    // "pagingType": "simple",
                    "searchable": false,
                    "language": {
                        "emptyTable": " "
                    },
                    "bDestroy": true

                });
            });
        </script>
@endsection


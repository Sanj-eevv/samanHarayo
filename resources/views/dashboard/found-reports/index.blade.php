@extends('layouts.dashboard')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="foundReportDatatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Status</th>
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
                $('#foundReportDatatable').DataTable({
                    "serverSide": true,
                    "ajax": {
                        "url": BASE_URL + '/dashboard/found-reports',
                        "dataType": "json",
                        "type": "GET",
                        "tryCount" : 0,
                        "retryLimit" : 3,
                        error: function(xhr, ajaxOptions, thrownError) {
                            toastError("Something went wrong!!!");
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
                            "data": "status",
                            "render": function ( data, type, row, meta ) {
                                let badge_color = data === 1 ? "bg-success" : "bg-danger"
                                let text = data === 1 ? 'Verified' : 'Pending'
                                return '<span class="p-2 badge '+badge_color + '">'+text+'</span>';
                            }
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
                    // "lengthMenu": [[100, 200, 500, -1], [ 100, 200, 500, 'All']],
                    "lengthMenu": [
                        [25, 50, 100, 500],
                        [25, 50, 100, 500]
                    ],
                    "pageLength": 25,
                    "deferRender": true,
                    fixedHeader: true,
                    "searchable": false,
                    "processing": true,
                    "language": {
                        "emptyTable": " ",
                        "processing": "<div class='spinner-border text-primary' role='status'>"+
                            "<span class='visually-hidden'>Loading...</span>"+
                            "</div>"
                    },
                });
            });
        </script>
@endsection


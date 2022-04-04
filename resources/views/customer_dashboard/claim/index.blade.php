@extends('layouts.customer_dashboard')
@section('title','Customer Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="claimedReportDatatable" class="table table-striped dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Detail Status</th>
                                <th>Claimed Date</th>
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
    <script>
            $(document).ready(function($) {
                $('#claimedReportDatatable').DataTable({
                    "serverSide": true,
                    "ajax": {
                        "url": BASE_URL + '/customer-dashboard/claim',
                        "dataType": "json",
                        "type": "GET",
                        "tryCount" : 0,
                        "retryLimit" : 3,
                        error: function(xhr, ajaxOptions, thrownError) {
                            if (xhr.status === 500) {
                                this.tryCount++;
                                if (this.tryCount <= this.retryLimit) {
                                    //try again
                                    $.ajax(this);
                                }
                            }
                            toastError("Something went wrong !!!");
                            $('.spinner-border').hide();
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
                            "data": "detail_status"
                        },
                        {
                            "data": "claimed_date"
                        },

                        {
                            "data": "action",
                            "searchable": false,
                            "orderable": false
                        }
                    ],
                    "rowId": 'slug',
                    "order": [
                        [0, "asc"]
                    ],
                    "lengthMenu": [
                        [25, 50, 100, 500],
                        [25, 50, 100, 500]
                    ],
                    "pageLength": 25,
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


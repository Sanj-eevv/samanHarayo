@extends('layouts.dashboard')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="faqDatatable" class="table table-striped dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Question</th>
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
    @include('dashboard.faqs._shared')
    <script>
            $(document).ready(function($) {
                let table = $('#faqDatatable').DataTable({
                    "serverSide": true,
                    "ajax": {
                        "url": BASE_URL + '/dashboard/faqs',
                        "dataType": "json",
                        "type": "GET",
                        "data": {
                            "_token": '{{csrf_token()}}'
                        },
                        "tryCount" : 0,
                        "retryLimit" : 3,
                        error: function(xhr, ajaxOptions, thrownError) {
                            if (xhr.status === 500) {
                                this.tryCount++;
                                if (this.tryCount <= this.retryLimit) {
                                    //try again
                                    $.ajax(this);
                                }else{
                                    toastError('Something went wrong !!!');
                                    $('.spinner-border').hide();
                                }
                            }
                        }
                    },
                    "columns": [{
                        "data": "question",
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
                    // "pagingType": "simple",
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


@extends('layouts.customer_dashboard')
@section('title', 'Notification')
@section('content')
    <div>
        @forelse($notifications as $notification)
        <div class="alert {{$notification['class']}} d-flex justify-content-between" role="alert">
            <a href="{{$notification->url}}" class="{{$notification['class']}}">
                {{ucwords($notification->data['title'])}}
            </a>
            <span class="mark-as-read" style="cursor: pointer;" data-id="{{$notification->id}}">Mark as read</span>
        </div>
        @empty
            <div class="alert alert-danger" role="alert">
                No New Notification
            </div>
        @endforelse
        @if($notifications->count() > 0)
        <div>
            <span class="text-primary" style="cursor: pointer;" id="mark-all">Mark all as read</span>
        </div>
        @endif
    </div>
@endsection
@section('page_level_script')
    <script>
        function sendMarkRequest(id=null){
            return $.ajax("{{route('customerDashboard.notification.mark')}}", {
                method:  "POST",
                data: {
                    "_token" : CSRF_TOKEN,
                    id,
                }
            });
        }
        $(document).ready(function (){
            let current_count =  parseInt($('#cust-notification').text());
            $('.mark-as-read').on('click', function(){
                let request = sendMarkRequest($(this).data('id'));
                request.done(()=>{
                    let new_count = current_count - 1;
                    current_count = new_count;
                    $('#cust-notification').text(new_count);
                   $(this).parents('div.alert').remove();

                });
            });

            $('#mark-all').on('click', function(){
                let request = sendMarkRequest();
                request.done(()=>{
                    $('#cust-notification').text('0');
                    $('div.alert').remove();
                });
            });
        });
    </script>
@endsection

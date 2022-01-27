<script src="https://www.paypal.com/sdk/js?client-id={{config('app.settings.paypal_client_id')}}"></script>
<script>
    paypal.Buttons().render('#paypal-card-element');
</script>

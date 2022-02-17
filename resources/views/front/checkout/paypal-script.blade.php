<script src="https://www.paypal.com/sdk/js?client-id={{config('app.settings.paypal_client_id')}}&currency=USD"></script>
<script>
    var choosenCurrency = @json($currencyTextRaw);
    var basicFormPaypal;
    var total_amount = @json($total);
    var serverErrorPaypal = "server_error_occurred_paypal";
    paypal.Buttons({
        createOrder: function(data, actions) {
            {{--basicFormPaypal.append("courseId", "{{$course->id}}");--}}
           var paypalAmount = basicFormPaypal.get("total");
           var adjustedAmount = adjustPaypalAmount(paypalAmount, choosenCurrency);
           return actions.order.create({
              purchase_units: [{
                  amount: {
                      currency_code: choosenCurrency,
                      value: adjustedAmount
                  }
              }],
              application_context: {
                  shipping_preference: "NO_SHIPPING",
              }
           });
        },
        onCancel: function (data) {
            resetFieldsAfterPayFail();
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function (details){
                document.querySelector('#total_paypal').value = basicFormStripe.get('total');
                document.querySelector('#transaction_paypal').value = details.purchase_units[0].payments.capture[0].id;
                var paypalForm = document.querySelector('#payment-form-paypal');
                paypalForm.submit();
            });
            {{--return fetch("{{ url('payment/captureOrderPayPal') }}" + "/" + data.orderID, {--}}
            {{--    method: "POST",--}}
            {{--    headers: {--}}
            {{--        "X-CSRF-Token": "{{ csrf_token() }}",--}}
            {{--    },--}}
            {{--}).then(function(res) {--}}
                // if(!res.ok)
                // {
                //     return serverErrorPaypal;
                // }
                // else
                // {
                //     return res.json();
                // }
            // }).then(function(orderData) {
                // if(orderData == serverErrorPaypal)
                // {
                //     showErrorAndScrollUp("The transaction could not be processed because of a server error");
                //     resetFieldsAfterPayFail();
                //     return;
                // }
                // Three cases to handle:
                //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                //   (2) Other non-recoverable errors -> Show a failure message
                //   (3) Successful transaction -> Show confirmation or thank you
                // This example reads a v2/checkout/orders capture response, propagated from the server
                // You could use a different API or structure for your 'orderData'
                // var errorDetail = Array.isArray(orderData.details) && orderData.details[0];
                // if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                //     return actions.restart(); // Recoverable state, per:
                //     // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                // }
                // if (errorDetail) {
                //     showErrorAndScrollUp("The transaction could not be processed because of a non-recoverable error");
                //     resetFieldsAfterPayFail();
                //     return;
                // }
                {{--$("#processingModal").modal('show');--}}
                {{--document.querySelector('#course_paypal').value = "{{$course->id}}";--}}
                {{--document.querySelector('#transaction_paypal').value = orderData[0].result.purchase_units[0].payments.captures[0].id;--}}
                {{--appendPaymentData(basicFormPaypal, "_paypal");--}}
                {{--var paypalForm = document.querySelector("#payment-form-paypal-smart");--}}
                {{--paypalForm.submit();--}}
            // });
        },
        onClick: function(data, actions)
        {
            var termsAreChecked = checkTermsAcceptance("paypal");
            if(termsAreChecked == false)
            {
                return actions.reject();
            }
            changeFieldsAfterPayStart();
            basicFormPaypal = new FormData();
            appendBasicData(basicFormPaypal);
            return fetch("{{ url('payment/paypal') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": "{{ csrf_token() }}",
                },
                body: JSON.stringify({
                    amount: total_amount,
                }),
            }).then(function(res){
                if(!res.ok)
                {
                    return serverErrorPaypal;
                }
                else
                {
                    return res.json();
                }
            }).then(function(data){
                if(data == serverErrorPaypal)
                {
                    showErrorAndScrollUp("Unknown error occured during PayPal Smart payment");
                    return actions.reject();
                }
                else if(data.successful_validation)
                {
                    return actions.resolve();
                }
                else
                {
                    var beautifiedError = beautifyJson(JSON.stringify(data));
                    showErrorAndScrollUp(beautifiedError);
                    return actions.reject();
                }
            });
        }
    }).render('#paypal-card-element');
    function adjustPaypalAmount(amountForPaypal, paypalCurrency){
        if((paypalCurrency === "HUF") || (paypalCurrency === "JPY") || (paypalCurrency === "TWD")){
            return parseInt(amountForPaypal);
        }
    }
</script>




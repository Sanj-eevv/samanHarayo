<script src="https://www.paypal.com/sdk/js?client-id={{config('app.settings.paypal_client_id')}}&currency=USD">
</script>
<script>
    var chosenCurrency = @json($currencyTextRaw);
    var basicFormPaypal;
    var total_amount = @json($total);
    var serverErrorPaypal = "server_error_occurred_paypal";
    paypal.Buttons({
        createOrder: function(data, actions) {
           let paypalAmount = basicFormPaypal.get("total");
            console.log(paypalAmount,'sswwww');
            let adjustedAmount = adjustPaypalAmount(paypalAmount, chosenCurrency);
            return actions.order.create({
              purchase_units: [{
                  amount: {
                      currency_code: chosenCurrency,
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
                console.log( details.purchase_units[0].payments.captures[0].id);
                document.querySelector('#total_paypal').value = basicFormPaypal.get("total");
                document.querySelector('#transaction_paypal').value = details.purchase_units[0].payments.captures[0].id;
                var paypalForm = document.querySelector('#payment-form-paypal');
                paypalForm.submit();
            });
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
                body: basicFormPaypal
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
                    showErrorAndScrollUp("Unknown error occurred during PayPal Smart payment");
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
        return amountForPaypal;
    }
</script>




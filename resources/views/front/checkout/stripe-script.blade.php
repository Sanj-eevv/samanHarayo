<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripePubKey = @json($stripePubKey);
    var stripe = Stripe(stripePubKey);
    var total = @json($total);
    var elements = stripe.elements();
    var stripeForm = document.querySelector("#payment-form-stripe");
    var paymentIntentId = "0";
    var serverErrorStripe = "Server error occurred stripe";
    var basicFormStripe;

    let style = {
        base: {
            color: "#32325d",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };

    let card = elements.create("card", { hidePostalCode: true, style: style });
    card.mount("#stripe-card-element");

    stripeForm.addEventListener("submit", function(event) {
        event.preventDefault();
        let termsAreChecked = checkTermsAcceptance();
        if(termsAreChecked == false)
        {
            return;
        }
        changeFieldsAfterPayStart();
        basicFormStripe = new FormData();
        appendBasicData(basicFormStripe);
        validateDataStripe();
        // completeStripePayment(total_amount);
    });

    function validateDataStripe()
    {
        $.ajax({
            url: "{{route('checkout.prePaymentValidation')}}",
            type: "POST",
            headers: {
                'X-CSRF-Token': CSRF_TOKEN
            },
            processData: false,
            contentType: false,
            data: basicFormStripe,
            success: function(result) {
                if( result.hasOwnProperty("successful_validation") )
                {
                    completeStripePayment(total);
                }
                else
                {
                    let fieldErrors = JSON.stringify(result, null, 1);
                    fieldErrors = beautifyJson(fieldErrors);
                    showErrorAndScrollUp(fieldErrors);
                }
            },
            error: function(result) {
                showErrorAndScrollUp("Unknown error during validation.");
            }
        });
    }

    function completeStripePayment(cart_id)
    {
        fetch("{{ url('payment/stripe') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": "{{ csrf_token() }}",
            },
            body: JSON.stringify({
                total: total,
                paymentIntentId: paymentIntentId,
            }),
        }).then(function(res) {
            if(!res.ok)
            {
                return serverErrorStripe;
            }
            else
            {
                return res.json();
            }
        }).then(function(data){
            if(data == serverErrorStripe)
            {
                showErrorAndScrollUp("Unknown error occurred during Stripe payment");
                return;
            }
            paymentIntentId = data.id;
            stripe.confirmCardPayment(data.client_secret, {
                payment_method: {
                    card: card,
                },
            }).then(function(data){
                if(data.error)
                {
                    showErrorAndScrollUp(data.error.message);
                }else if(data.paymentIntent){
                        basicFormStripe.append("transaction_id",  data.paymentIntent.id);
                        document.querySelector('#transaction_stripe').value = data.paymentIntent.id;
                        document.querySelector('#total_stripe').value = basicFormStripe.get('total');
                       document.querySelector('#via_stripe').value = 'stripe';

                    stripeForm.submit();
                }
            });
        });
    }
</script>


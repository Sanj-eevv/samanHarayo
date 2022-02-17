<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripePubKey = @json($stripePubKey);
    var stripe = Stripe(stripePubKey);
    var total_amount = @json($total);
    var elements = stripe.elements();
    var stripeForm = document.querySelector("#payment-form-stripe");
    var paymentIntentId = "0";
    var serverErrorStripe = "server_error_occured_stripe";
    var basicFormStripe;
    var style = {
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

    var card = elements.create("card", { hidePostalCode: true, style: style });
    card.mount("#stripe-card-element");

    stripeForm.addEventListener("submit", function(event) {
        event.preventDefault();
        var termsAreChecked = checkTermsAcceptance();
        if(termsAreChecked == false)
        {
            return;
        }
        changeFieldsAfterPayStart();
        basicFormStripe = new FormData();
        appendBasicData(basicFormStripe);
        completeStripePayment(total_amount);
    });


    function completeStripePayment(cart_id)
    {
        fetch("{{ url('payment/stripe') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": "{{ csrf_token() }}",
            },
            body: JSON.stringify({
                amount: total_amount,
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
                    return;
                }else if(data.paymentIntent)
                {
                    document.querySelector('#transaction_stripe').value = data.paymentIntent.id;
                    document.querySelector('#total_stripe').value = basicFormStripe.get('total');
                    stripeForm.submit();
                }
            });
        });
    }
</script>


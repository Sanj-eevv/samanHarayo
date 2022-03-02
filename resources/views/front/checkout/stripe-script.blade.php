<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripePubKey = @json($stripePubKey);
    var stripe = Stripe(stripePubKey);
    var total = @json($total);
    var elements = stripe.elements();
    var stripeForm = document.querySelector("#payment-form-stripe");
    var paymentIntentId = "0";
    var serverErrorStripe = "Server error occurred stripe";
    var require_identity = false;
    var basicFormStripe;
    var identity_front;
    var identity_back;
    var current_photo;
    var product_photo;
    var description;


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
        let current_path = window.location.pathname;
        require_identity = false;
        if(current_path === "/identity"){
            require_identity = true;
        }
        let termsAreChecked = checkTermsAcceptance();
        if(termsAreChecked == false)
        {
            return;
        }
        changeFieldsAfterPayStart();
        basicFormStripe = new FormData();
        appendBasicData(basicFormStripe, require_identity);
        validateDataStripe(require_identity);
        // completeStripePayment(total_amount);
    });

    function validateDataStripe(require_identity = false)
    {
        $.ajax({
            url: "{{route('checkout.prePaymentValidation')}}",
            method: "POST",
            data: basicFormStripe,
            processData: false,
            contentType: false,
            success: function(result) {
                if( result.hasOwnProperty("successful_validation") )
                {
                    completeStripePayment(total_amount);
                }
                else
                {
                    // let fieldErrors = JSON.stringify(result, null, 1);
                    let values = Object.keys(result).map(function (key) { return result[key]; });
                    let fieldErrors = values.toString();
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
                    if(require_identity){
                        $.ajax({
                            url: "{{route('identity.store')}}",
                            method: "POST",
                            data: basicFormStripe,
                            processData: false,
                            contentType: false,
                            success: function(result) {
                            },
                            error: function(result) {
                                showErrorAndScrollUp("Unknown error during validation.");
                            }
                        });
                    }else{
                        document.querySelector('#transaction_stripe').value = data.paymentIntent.id;
                        document.querySelector('#total_stripe').value = basicFormStripe.get('total');
                        stripeForm.submit();
                    }

                }
            });
        });
    }
</script>


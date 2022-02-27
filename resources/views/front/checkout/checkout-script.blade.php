<script>
    function checkTermsAcceptance(method = "stripe")
    {
        let isChecked = true;
        if(method === "paypal"){
            if( $("#paypal_terms_checkbox").prop("checked") == false ){
                isChecked = false;
            }
        }
        if(method === "stripe"){
            if( $("#terms_checkbox").prop("checked") == false )
            {
                isChecked = false;
            }
        }
        if(!isChecked){
            showErrorAndScrollUp("The terms and conditions and the privacy policy must be accepted before payment.");
            return false;
        }
        return true;
    }

    function showErrorAndScrollUp(errorText)
    {
        $("#paymentErrorAlert").hide();
        $("#validationErrorText").html(errorText);
        $("#validationErrorAlert").show();
        resetFieldsAfterPayFail();
        window.scrollTo(0, 0);
    }

    function resetFieldsAfterPayFail()
    {
        $("#payStartSpinner").hide();
        $("#terms_checkbox").prop("disabled", false);

        if( $("#payStartBtnStripe").length )
        {
            $("#payStartBtnStripe").prop("disabled", false);
        }
    }

    function changeFieldsAfterPayStart()
    {
        $("#validationErrorAlert").hide();
        $("#validationErrorText").html("");
        $("#paymentErrorAlert").hide();
        $("#payStartSpinner").show();

        $("#terms_checkbox").prop("disabled", true);
        if( $("#payStartBtnStripe").length )
        {
            $("#payStartBtnStripe").prop("disabled", true);
        }
    }
    function appendBasicData(emptyForm, require_identity = false)
    {
        emptyForm.append("_token", "{{ csrf_token() }}");
        emptyForm.append("total", "{{$total}}");
        emptyForm.append("currency", "{{$currencyTextRaw}}");
        emptyForm.append("require_identity", require_identity);
        if(require_identity){
            let identity_front =   document.getElementById('identity_front_input').files[0];
            let identity_back  =   document.getElementById('identity_back_input').files[0];
            let current_photo  =   document.getElementById('current_photo_input').files[0];
            let product_photo  =   document.querySelector("[name='product_photo[]']").files;
            let description    =   document.getElementById('description').value;

            if(identity_front){
                emptyForm.append("identity_front", identity_front);
            }
            if(identity_back){
                emptyForm.append("identity_back", identity_back);
            }
            if(current_photo){
                emptyForm.append("current_photo", current_photo);
            }
            if(description){
                emptyForm.append("description", description);
            }
            emptyForm.append("product_photo", product_photo);
        }
    }
    function beautifyJson(passedStr)
    {
        passedStr = passedStr.replace(/{/g, "");
        passedStr = passedStr.replace(/}/g, "");
        passedStr = passedStr.replace(/\[/g, "");
        passedStr = passedStr.replace(/]/g, "");
        passedStr = passedStr.replace(/,/g, "");
        passedStr = passedStr.replace(/"/g, "");
        passedStr = passedStr.replace(/:/g, ": ");
        passedStr = passedStr.replace(/\./g, ".</br>");

        return passedStr;
    }

</script>

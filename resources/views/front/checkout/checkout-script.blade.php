<script>

    function checkTermsAcceptance()
    {
        if( $("#terms_checkbox").prop("checked") == false )
        {
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
    function appendBasicData(emptyForm)
    {
        emptyForm.append("_token", "{{ csrf_token() }}");
        emptyForm.append("total", {{$total}});
        emptyForm.append("currency", "{{$currencyTextRaw}}");
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

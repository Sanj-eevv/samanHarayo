<script>
    function deleteContact(id,redirect = false)
    {
        let table = 'contactDatatable';
        let action = BASE_URL+"/dashboard/contacts/"+id;
        $.ajax({
            "url": action,
            "dataType":"json",
            "type":"DELETE",
            "data":{"_token":CSRF_TOKEN},
            beforeSend:function(){
                removeRowFromTable(table,id);
                // $form.addClass("sp-loading");
            },
            success:function(resp){
                // $form.removeClass("sp-loading");
                if(redirect){
                    alertifySuccessAndRedirect(resp.message, "{{route('contacts.index')}}");
                }else{
                    alertifySuccess(resp.message);
                }
            },
            error: function(xhr){
                let obj = JSON.parse(xhr.responseText);
                showRowFromTable(table,id);
                alertifyError(obj.message);
                // $form.removeClass("sp-loading");
            }
        });

    }
</script>

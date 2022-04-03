<script>
    function deleteClaim(user_id, report_id,redirect = false)
    {
        let action = BASE_URL+"/dashboard/claim/delete/"+user_id+'/'+report_id;
        $.ajax({
            "url": action,
            "dataType":"json",
            "type":"DELETE",
            "data":{"_token":CSRF_TOKEN},
            beforeSend:function(){
                $('#delete-btn .spinner-border').show();
                $('#delete-btn').prop('disabled', true);
            },
            success:function(resp){
                if(redirect){
                    alertifySuccessAndRedirect(resp.message, BASE_URL+"/dashboard/found-reports/"+report_id);
                }else{
                    alertifySuccess(resp.message);
                }
            },
            error: function(xhr){
                $('#delete-btn .spinner-border').hide();
                $('#delete-btn').prop('disabled', false);
                let obj = JSON.parse(xhr.responseText);
                alertifyError(obj.message);
            }
        });

    }
</script>

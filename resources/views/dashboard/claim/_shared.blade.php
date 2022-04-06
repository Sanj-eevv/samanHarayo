<script>
    function deleteClaim(user_id,report_id,type,redirect = false)
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
                    let url = BASE_URL+"/dashboard/lost-reports/"+report_id;
                    if(type === 'found'){
                        url = BASE_URL+"/dashboard/found-reports/"+report_id;
                    }
                    alertifySuccessAndRedirect(resp.message, url);
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

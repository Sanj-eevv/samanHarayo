<script>
    function deleteReport(id,redirect = false)
    {
        let table = 'lostReportDatatable';
        let action = BASE_URL+"/dashboard/lost-reports/"+id;
        $.ajax({
            "url": action,
            "dataType":"json",
            "type":"DELETE",
            "data":{"_token":CSRF_TOKEN},
            beforeSend:function(){
                removeRowFromTable(table,id);
            },
            success:function(resp){
                if(redirect){
                    alertifySuccessAndRedirect(resp.message, "{{route('lost-reports.index')}}");
                }else{
                    alertifySuccess(resp.message);
                }
            },
            error: function(xhr){
                let obj = JSON.parse(xhr.responseText);
                showRowFromTable(table,id);
                alertifyError(obj.message);
            }
        });

    }
</script>

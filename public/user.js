function edit(id)
{
    console.log(id);
    $.ajax({
        type: "GET",
        url: "/data/" + id + "/edit",
        data: { id },
        success: function (data) {
            console.log(data.data);
            $("#editname").val(data.data.name);
            $("#editemail").val(data.data.email);
            $("#editphone").val(data.data.phone);
            $("input[name=dob]").val(data.data.dob);
            // $("input[name=gender]").val(data.data.gender);
            $("input[name=gender][value=" + data.data.gender + "]").prop('checked', true);

           
            $("#edit_form").attr("action", "/data/" + id);
            
            $("#edit_method").val("PUT");
        },
    });
}

function delete_user(id)
{
    console.log(id);
    var token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        url: "/data/" + id,
        type: "Delete",
        data: { _token: token },
        success: function (data) {
                       alert('Data Deleted');
            window.location.reload();
        },
    });

}
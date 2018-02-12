//Prevents page from loading to php
$(document).ready(function () {
    $('#submitRequest').click(function () {
        var formData = {
            'name': $('input[name=requestName]').val(),
            'agency': $('input[name=requestAgency]').val(),
            'email': $('input[name=requestEmail]').val(),
            'service': $('select[name=requestService]').val(),
            'desc': $('textarea[name=requestDesc]').val(),
        }
        $.ajax({
            url: '/confluence/Scripts/sql/request_sql.php',
            type: 'POST',
            data: formData,
            dataType: 'text',
            success: function () {
                alert("Data submitted successfully!");
            },
            error: function (e) {
                console.log('Error!', e);
                alert("There was an error submitting data.  Please contact administrator. kassrah.rezagholi@state.co.us");
            }
        });
    });


})

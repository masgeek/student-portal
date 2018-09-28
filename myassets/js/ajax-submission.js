'use strict';

$(function () {
    $('#pay').click(function () {
        $.ajax({
            type: 'post',
            url: 'process-mpesa.php',
            data: $('#mpesa-form').serialize(),
            success: function (data) {
                //show relevant message to user based on response data e.g
                if (data.ResponseCode === 0) { //0 means successful
                    alert(data.CustomerMessage);
                }

                //lof the response
                console.log(data);
            },
            error: function (req, status, err) {
                console.log('something went wrong', status, err);
            }
        });
    });
});
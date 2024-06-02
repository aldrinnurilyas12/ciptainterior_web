$(document).ready(function() {
    $('#resetForm').submit(function(e) {
        e.preventDefault();
        var password = $('input[name="password"]').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('user/reset_password'); ?>',
            data: {
                password: password
            },
            success: function(response) {
                swal("Password berhasil diubah!");
                // Redirect to user-profile page after success
                window.location.href = '<?php echo base_url('user-profile'); ?>';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Display an error message if something went wrong
                swal("Oops!", "Something went wrong. Please try again later.", "error");
            }
        });
    });
});

function openCity(evt, cityName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-tab", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " w3-tab";
}
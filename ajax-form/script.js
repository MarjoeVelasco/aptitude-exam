$(document).ready(function() {
    $('#profile-form').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'add.php',
            data: formData,
            success: function(response) {
                $('#error-message').html(response);

                // Check if the response indicates success
                if (response.indexOf('successfully') !== -1) {
                    // Reset the form
                    $('#profile-form')[0].reset();
                }
                
            }
        });
    });

    // Calculate age based on date of birth
    $('#dob').change(function() {
        var dob = new Date($('#dob').val());
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();

        // Adjust age if the birthday hasn't occurred yet this year
        if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
            age--;
        }

        $('#age').val(age);
    });
});

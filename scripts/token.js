//token maching

function submitForm() {
    // Prompt the user for a token
    var enteredToken = prompt("Please enter your token:");

    // Check if the entered token is not null (user clicked Cancel)
    if (enteredToken !== null) {
        // Add the entered token to the form data
        $("#registrationForm").append('<input type="hidden" name="enteredToken" value="' + enteredToken + '">');

        // Serialize the form data
        var formData = $("#registrationForm").serialize();

        // Perform the AJAX request
        $.ajax({
            type: "POST",
            url: "process.php",
            data: formData,
            success: function (response) {
                $("#result").html(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
}
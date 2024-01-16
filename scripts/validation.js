// aadhaar validation
function validateAadhaarInput() {
    var aadhaarInput = document.getElementById('aadhaarNo');
    var validationMsg = document.getElementById('aadhaarValidationMsg');

    if (aadhaarInput.value.length < 12) {
        // Display a message if Aadhaar number is too short
        validationMsg.innerText = "Aadhaar number is too short.";
    } else if (aadhaarInput.value.length > 12) {
        // Display a message if Aadhaar number is too long
        validationMsg.innerText = "Aadhaar number is too long. Please enter only 12 digits.";
    } else {
        // Clear the validation message if Aadhaar number is valid
        validationMsg.innerText = "";
    }
}

//phone no validation

function validatePhoneInput() {
    var phoneInput = document.getElementById('phoneNo');
    var validationMsg = document.getElementById('phoneValidationMsg');

    // Remove non-digit characters from the input
    var phoneNumber = phoneInput.value.replace(/\D/g, '');

    if (phoneNumber.length !== 10) {
        // Display a message if the phone number is not 10 digits
        validationMsg.innerText = "Phone number must be 10 digits.";
    } else {
        // Clear the validation message if the phone number is valid
        validationMsg.innerText = "";
    }

    // Format the phone number as +91 XXXXX XXXXX
    phoneInput.value = formatPhoneNumber(phoneNumber);
}

// Function to format the phone number as +91 XXXXX XXXXX
function formatPhoneNumber(phoneNumber) {
    var formattedPhoneNumber = phoneNumber.replace(/(\d{5})(\d{5})/, '+91 $1 $2');
    return formattedPhoneNumber;
}



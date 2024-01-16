
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="http://localhost/temp/registration/css/style.css" rel="stylesheet">
    <title>Student Registration Form</title>
</head>

    <body>
        <div class="container mb-3">

            <div class="heading mt-3">
                <h2 class="text-center font-weight-bold">Registration Form</h2>
            </div>

            <form  id="registrationForm" class="mt-3" action="http://localhost/temp/registration/proccess.php" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="row ">
                            <div class="col-lg-9 ml-1">

                                <div class="mb-3">
                                    <label for="aadhaarNo" class="form-label font-weight-bold">Aadhaar No</label>
                                    <input type="number" class="form-control" id="aadhaarNo" name="aadhaarNo"
                                        placeholder="Enter Aadhaar No" maxlength="12" required oninput="validateAadhaarInput()">
                                    <div id="aadhaarValidationMsg" class="text-danger small"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label font-weight-bold">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="fatherName" class="form-label font-weight-bold">Father Name</label>
                                    <input type="text" class="form-control" id="fatherName" name="fatherName"
                                        placeholder="Enter Father Name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="rollNo" class="form-label font-weight-bold">Roll No</label>
                                    <input type="tel" class="form-control" id="rollNo" name="rollNo"
                                        placeholder="Enter Roll No" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phoneNo" class="form-label font-weight-bold">Phone No</label>
                                    <input type="tel" class="form-control" id="phoneNo" name="phoneNo"
                                          placeholder="Enter Phone No" required oninput="validatePhoneInput()">
                                    <div id="phoneValidationMsg" class="text-danger small"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label font-weight-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="dob" class="form-label font-weight-bold">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        placeholder="Select Date of Birth" required  max="<?php echo date('Y-m-d'); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="course" class="form-label font-weight-bold">Course</label>
                                    <select class="form-control" id="course" name="course" onchange="updateYearOptions()"
                                        required>
                                        <option value="" disabled selected>Select Course</option>
                                        <option value="Bpharma">B.pharma</option>
                                        <option value="Dpharma">D.pharma</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="year" class="form-label font-weight-bold">Year</label>
                                    <select class="form-control" id="year" name="year" required>
                                        <option value="" disabled selected>Select Year</option>
                                    </select>
                                </div>


                            </div>
                        </div>

                    </div>


                    <div class="col-lg-6 image">
                        <div class="row">
                            <div class="col-lg-6 mx-auto image">
                                <div class="mb-3">
                                    <label for="passportPhoto" class="form-label font-weight-bold">
                                        Photograph</label>
                                    <input type="file" class="form-control" id="passportPhoto" name="passportPhoto"
                                        onchange="previewImage(this)" required accept="image/png, image/jpeg">
                                    <p class="text-dark text-muted small ">Please select a png or jpeg file within 500kb.Background must be single colured
                                    </p>
                                    <div class="imgoutline">
                                        <img id="passportPhotoPreview" src="#" alt="Preview" class="mt-2">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mx-auto image">
                                <div class="mb-3">
                                    <label for="signImage" class="form-label font-weight-bold">Signature</label>

                                    <input type="file" class="form-control" id="signImage" name="signImage"
                                        onchange="previewImage(this)" required accept="image/png, image/jpeg">
                                    <p class="text-dark text-muted small ">Please select a png or jpeg file within 500kb.Backgroung must be white.
                                    </p>
                                    <div class="imgoutline">
                                        <img id="signImagePreview" src="#" alt="Preview" class="mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="mb-5  col-lg-6  mx-auto form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox" required>
                        <label class="form-check-label" for="checkbox">I declare that I have read and filled the
                            above information is corrcet.</label>
                    </div>

                    <div class="mx-auto col-lg-6 mt-3">
                        <button type="submit" class="btn  btn-primary text-light  btn-outline-success col-lg-3 ">Submit</button>
                    </div>
                </div>

            </form>
        </div>


        <script>
           
            function submitForm() {
                var formData = $("#registrationForm").serialize();

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

        </script>

        <script src="http://localhost/temp/registration/scripts/validation.js"></script>
        <script src="http://localhost/temp/registration/scripts/imgpreview.js"></script>
        <script src="http://localhost/temp/registration/scripts/updateYear.js"></script>
        <script src="http://localhost/temp/registration/scripts/token.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    </body>

</html>
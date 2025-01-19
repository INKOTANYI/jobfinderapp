<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
        }

        .register-container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .register-container h3 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .upload-section {
            margin-top: 20px;
        }

        .upload-section h4 {
            margin-bottom: 15px;
            color: #333;
        }

        .column-layout {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .column-layout .form-group {
            flex: 1;
        }

        .form-row {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container register-container">
        <h3>Application Form</h3>

        <!-- Display success message if available -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('store-engineer') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Applicant Information -->
            <div class="form-row column-layout">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your last name" required>
                </div>
            </div>

            <div class="form-row column-layout">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                    
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required>
                    <small id="phoneError" class="text-danger" style="display: none;"></small> <!-- Error message will appear here -->
                </div>
            </div>

            <div class="form-row column-layout">
                <div class="form-group">
                    <label for="experience">Experience:</label>
                    <input type="text" name="experience" id="experience" class="form-control" placeholder="Enter your experience" required>
                </div>
                <div class="form-group">
                    <label for="departement">Department:</label>
                    <select id="departement" name="departement_id" class="form-control" required>
                        <option value="">Select Department</option>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Document Upload Section -->
            <div class="upload-section">
                <h4>Upload Your Documents</h4>
                <div class="form-group">
                    <label for="cv_path">Upload CV (PDF only):</label>
                    <input type="file" name="cv_path" id="cv_path" class="form-control" accept=".pdf" required>
                </div>
                <div class="form-group">
                    <label for="degree_path">Upload Degree Certificate (PDF only):</label>
                    <input type="file" name="degree_path" id="degree_path" class="form-control" accept=".pdf" required>
                </div>
                <div class="form-group">
                    <label for="nida_path">Upload ID/Passport (PDF only):</label>
                    <input type="file" name="nida_path" id="nida_path" class="form-control" accept=".pdf" required>
                </div>
            </div>

            <!-- Location Section -->
            <div class="upload-section">
                <h4>Location Details</h4>
                <div class="form-row column-layout">
                    <div class="form-group">
                        <label for="province">Province:</label>
                        <select id="province" name="province_id" class="form-control" required>
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <select id="district" name="district_id" class="form-control" required>
                            <option value="">Select District</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sector">Sector:</label>
                    <select id="sector" name="sector_id" class="form-control" required>
                        <option value="">Select Sector</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Province to District Dropdown
            $('#province').on('change', function () {
                var province_id = $(this).val();
                if (!province_id) {
                    $('#district').html('<option value="">Select District</option>');
                    $('#sector').html('<option value="">Select Sector</option>'); // Reset sector as well
                    return;
                }
    
                $.ajax({
                    url: '/get-district/' + province_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (districts) {
                        $('#district').empty().append('<option value="">Select District</option>');
                        $('#sector').empty().append('<option value="">Select Sector</option>'); // Reset sector
                        $.each(districts, function (key, district) {
                            $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                        });
                    },
                    error: function (xhr) {
                        console.error('Error fetching districts:', xhr.responseText);
                    },
                });
            });
    
            // District to Sector Dropdown
            $('#district').on('change', function () {
                var district_id = $(this).val();
                if (!district_id) {
                    $('#sector').html('<option value="">Select Sector</option>');
                    return;
                }
    
                $.ajax({
                    url: '/get-sector/' + district_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (sectors) {
                        $('#sector').empty().append('<option value="">Select Sector</option>');
                        $.each(sectors, function (key, sector) {
                            $('#sector').append('<option value="' + sector.id + '">' + sector.name + '</option>');
                        });
                    },
                    error: function (xhr) {
                        console.error('Error fetching sectors:', xhr.responseText);
                    },
                });
            });
    
            // Check Phone Uniqueness and Format
            $('#phone').on('blur', function () {
                var phone = $(this).val();
                if (phone) {
                    $.ajax({
                        url: "{{ route('check-phone') }}",
                        method: 'GET',
                        data: { phone: phone },
                        success: function (response) {
                            if (!response.valid) {
                                $('#phoneError').text(response.message).show(); // Show format validation error
                            } else if (response.exists) {
                                $('#phoneError').text('This phone number is already taken.').show(); // Show duplicate error
                            } else {
                                $('#phoneError').hide(); // Hide error if phone is valid and not duplicated
                            }
                        },
                        error: function (xhr) {
                            console.error('Error checking phone:', xhr.responseText);
                            $('#phoneError').text('An error occurred while validating phone number.').show();
                        },
                    });
                }
            });
    
            // AJAX Form Submission
            $('#engineerForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission
    
                let formData = new FormData(this); // Get form data
    
                $.ajax({
                    url: "{{ route('store-engineer') }}", // Laravel route for saving form
                    type: "POST",
                    data: formData,
                    contentType: false, // Required for FormData
                    processData: false, // Required for FormData
                    success: function (response) {
                        if (response.success) {
                            // Show success message
                            $('#successModal').modal('show');
    
                            // Reset the form
                            $('#engineerForm')[0].reset();
                            $('#district').html('<option value="">Select District</option>');
                            $('#sector').html('<option value="">Select Sector</option>');
                            $('#phoneError').hide();
                        } else {
                            // Display validation errors
                            if (response.errors) {
                                for (const [key, value] of Object.entries(response.errors)) {
                                    $(`#${key}Error`).text(value).show();
                                }
                            }
                        }
                    },
                    error: function (xhr) {
                        console.error('Something went wrong:', xhr.responseText);
                        alert('An unexpected error occurred. Please try again.');
                    },
                });
            });
        });
    </script>
    
</body>

</html>

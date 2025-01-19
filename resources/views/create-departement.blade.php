<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>

    <style>
        /* General styling */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to top, #00c6ff, #0072ff);
            color: #444;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            padding: 30px;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .register-card h3 {
            text-align: center;
            color: #0072ff;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 24px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
            color: #0072ff;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group button {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: all 0.3s ease-in-out;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #0072ff;
            outline: none;
        }

        .form-group button {
            background-color: #0072ff;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .form-group button:hover {
            background-color: #005bb5;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group .file-label {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        .form-group select {
            height: 50px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #fff;
            font-size: 14px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .register-card {
                width: 90%;
                padding: 20px;
            }

            .form-group input,
            .form-group select,
            .form-group button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="register-card">
            <h3>Join the JobFinder Community</h3>
            @if (session('success'))
                <div style="color: green; text-align: center;">{{ session('success') }}</div>
            @endif
            <form action="{{ route('store-engineer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="Your First Name" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Your Last Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Your Phone Number" required>
                </div>
                <div class="form-group">
                    <label for="experience">Experience</label>
                    <input type="text" name="experience" id="experience" placeholder="Your Experience" required>
                </div>
                <div class="form-group">
                    <label for="departement">Department</label>
                    <select id="departement" name="departement_id" required>
                        <option value="">Select a department</option>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}">
                                {{ $departement->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Document Uploads -->
                <div class="form-group">
                    <label for="cv_path">Upload CV (PDF only)</label>
                    <input type="file" name="cv_path" id="cv_path" accept=".pdf" required>
                    <span class="file-label">Only PDF files</span>
                </div>
                <div class="form-group">
                    <label for="degree_path">Upload Degree (PDF only)</label>
                    <input type="file" name="degree_path" id="degree_path" accept=".pdf" required>
                    <span class="file-label">Only PDF files</span>
                </div>
                <div class="form-group">
                    <label for="nida_path">Upload ID/Passport (PDF only)</label>
                    <input type="file" name="nida_path" id="nida_path" accept=".pdf" required>
                    <span class="file-label">Only PDF files</span>
                </div>

                <!-- Location Information -->
                <div class="form-group">
                    <label for="province">Province</label>
                    <select id="province" name="province_id" required>
                        <option value="">Select Province</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="district">District</label>
                    <select id="district" name="district_id" required>
                        <option value="">Select District</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sector">Sector</label>
                    <select id="sector" name="sector_id" required>
                        <option value="">Select Sector</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </form>
            <div class="footer">
                Already have an account? <a href="#">Login here</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#province').on('change', function() {
                var province_id = $(this).val();
                if (!province_id) {
                    $('#district').html('<option value="">Select District</option>');
                    return;
                }

                $.ajax({
                    url: '/get-district/' + province_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(districts) {
                        $('#district').empty().append('<option value="">Select District</option>');
                        $.each(districts, function(key, district) {
                            $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                        });
                    }
                });
            });

            $('#district').on('change', function() {
                var district_id = $(this).val();
                if (!district_id) {
                    $('#sector').html('<option value="">Select Sector</option>');
                    return;
                }

                $.ajax({
                    url: '/get-sector/' + district_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(sectors) {
                        $('#sector').empty().append('<option value="">Select Sector</option>');
                        $.each(sectors, function(key, sector) {
                            $('#sector').append('<option value="' + sector.id + '">' + sector.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>

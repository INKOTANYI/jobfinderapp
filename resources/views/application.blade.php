<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .register {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            margin-top: 3%;
            padding: 3%;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            display: block;
            /* Allows margin auto to center the button */
            margin: 10% auto;
            /* Centers horizontally and sets top margin */
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
            text-align: center;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
    </style>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="//https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome to [JobFinder]!</h3>
                </br>
                <p>Your career journey starts here! 🌟

                    We’re thrilled to have you onboard, and we’re here to help you find the job that fits your skills,
                </p>
                <p>We're here to help you achieve your career dreams. Let's get started and find the job you love!

                    Happy Job Hunting!</p>
            </div>
            <div class="col-md-9 register-right">

                @if (session('success'))
                    <div style="color: green;">{{ session('success') }}</div>
                @endif
                <form action="{{ route('store-engineer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <h3 class="register-heading">Applicant Application Form</h3>
                            <br>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h2>Applicant Profile</h2>
                                    </div>
                                    <div class="form-group">
                                        <label for="fname">First Name:</label>
                                        <input type="text" name="fname" id="fname"
                                            class="form-control form-control-lg" placeholder="Enter your First Name  *"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" name="lname" id="lname"
                                            class="form-control form-control-lg" placeholder="Enter your Last Name  *"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-lg" placeholder="Enter your Email  *"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" name="phone" id="phone"
                                            class="form-control form-control-lg" placeholder="Enter your Phone *"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="experience">Experience:</label>
                                        <input type="text" name="experience" id="experience"
                                            class="form-control form-control-lg" placeholder="Enter your Experience  *"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="departement">Departement:</label>
                                        <select id="departement" name="departement_id"
                                            class="form-control form-control-lg" placeholder="Enter your Departement  *"
                                            required>
                                            <option value="">Select a departement</option>
                                            @foreach ($departements as $departement)
                                                <option value="{{ $departement->id }}"
                                                    {{ old('departement_id') == $departement->id ? 'selected' : '' }}>
                                                    {{ $departement->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h2>Applicant Aploads</h2>
                                    </div>
                                    <div class="form-group">
                                        <label for="cv_path">Upload CV (PDF only):</label>
                                        <input type="file" name="cv_path" id="cv_path" accept=".pdf"
                                            class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="degree_path">Upload Degree Certificate (PDF only):</label>
                                        <input type="file" name="degree_path" id="degree_path"
                                            class="form-control form-control-lg" accept=".pdf" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nida_path">Upload ID/Passport (PDF only):</label>
                                        <input type="file" name="nida_path" id="nida_path" accept=".pdf"
                                            class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <h2> Applicant Adress </h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="province">Province:</label>
                                            <select id="province" name="province_id"
                                                class="form-control form-control-lg"
                                                placeholder="Enter your First Name  *" required>
                                                <option value="">Select a province</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}"
                                                        {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="district">District:</label>
                                            <select id="district" name="district_id"
                                                class="form-control form-control-lg"
                                                placeholder="Enter your First Name  *" required>
                                                <option value="">Select a District</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sector">Sector:</label>
                                            <select id="sector" name="sector_id"
                                                class="form-control form-control-lg" required>
                                                <option value="">Select a Sector</option>

                                            </select>

                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase"
                                            id="submitbtn" name="saveschooldetails" type="submit">
                                            <i class="icofont-login"></i> SUBMIT </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#province').on('change', function() {
                    var $province_id = $(this).val();

                    // Clear city dropdown if no country is selected
                    if (!$province_id) {
                        $('#district').html('<option value="">Select District</option>');
                        return;
                    }

                    // Perform AJAX request to get cities for the selected country
                    $.ajax({
                        url: '/get-district/' + $province_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(getdistricts) {
                            $('#district').empty(); // Clear the city dropdown
                            $('#district').append(
                                '<option value="">Select City</option>'); // Add default option

                            // Populate the city dropdown with cities
                            $.each(getdistricts, function(key, getdistrict) {
                                $('#district').append('<option value="' + getdistrict.id +
                                    '">' +
                                    getdistrict
                                    .name + '</option>');
                            });
                        }
                    });
                });
            });
        </script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#district').on('change', function() {
                    var $district_id = $(this).val();

                    // Clear city dropdown if no country is selected
                    if (!$district_id) {
                        $('#sector').html('<option value="">Select Sector</option>');
                        return;
                    }

                    // Perform AJAX request to get cities for the selected country
                    $.ajax({
                        url: '/get-sector/' + $district_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(getsectors) {
                            $('#sector').empty(); // Clear the city dropdown
                            $('#sector').append(
                                '<option value="">Select Sector</option>'); // Add default option

                            // Populate the city dropdown with cities
                            $.each(getsectors, function(key, getsector) {
                                $('#sector').append('<option value="' + getsector.id +
                                    '">' +
                                    getsector
                                    .name + '</option>');
                            });
                        }
                    });
                });
            });
        </script>

</body>

</html>

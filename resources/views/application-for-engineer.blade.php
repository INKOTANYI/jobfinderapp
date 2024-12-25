<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


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

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Engineering Solution</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('homepage') }}" class="nav-item nav-link active">Back To Home</a>
                </div>
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
            </div>

        </nav>

        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="//https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>Welcome to engineering Market Solution !</h3>
                    </br>
                    <p>Your career journey starts here! 🌟

                        We’re thrilled to have you onboard, and we’re here to help you find the job that fits your
                        skills,
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
                                <h3 class="register-heading">Engineers Application Form</h3>
                                <br>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h2>Engineers Profile</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="fname">First Name:</label>
                                            <input type="text" name="fname" id="fname"
                                                class="form-control form-control-lg"
                                                placeholder="Enter your First Name  *" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Last Name:</label>
                                            <input type="text" name="lname" id="lname"
                                                class="form-control form-control-lg"
                                                placeholder="Enter your Last Name  *" required>
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
                                                class="form-control form-control-lg"
                                                placeholder="Enter your Experience  *" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="departement">Departement:</label>
                                            <select id="departement" name="departement_id"
                                                class="form-control form-control-lg"
                                                placeholder="Enter your Departement  *" required>
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
                                            <h2>Engineers Aploads</h2>
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
                                                <h2> Engineers Adress </h2>
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

            <script>
                < script >
                    $(document).ready(function() {
                        $('#email').on('blur', function() {
                            let email = $(this).val();
                            $('#emailError').text(''); // Clear previous errors

                            // Send AJAX request for validation
                            $.ajax({
                                url: "{{ route('validate-engineer') }}",
                                method: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    email: email
                                },
                                success: function(response) {
                                    console.log(response.message); // Validation passed
                                },
                                error: function(xhr) {
                                    if (xhr.status === 422) {
                                        let errors = xhr.responseJSON.errors;
                                        if (errors.email) {
                                            $('#emailError').text(errors.email[0]);
                                        }
                                    }
                                }
                            });
                        });

                        // Prevent form submission if validation errors exist
                        $('#engineerForm').on('submit', function(e) {
                            if ($('#emailError').text() !== '') {
                                e.preventDefault();
                                alert('Please fix validation errors before submitting the form.');
                            }
                        });
                    }); <
                />
            </script>



        </div>

    </div>

    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Company</h5>
                    <a class="btn btn-link text-white-50" href="#Home">About Us</a>
                    <a class="btn btn-link text-white-50" href="">Contact Us</a>
                    <a class="btn btn-link text-white-50" href="{{ route('create-application') }}">Register</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link text-white-50" href="#AboutUs">About Us</a>
                    <a class="btn btn-link text-white-50" href="#ContactUs">Contact Us</a>
                    <a class="btn btn-link text-white-50" href="{{ route('create-application') }}">Register</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Contact</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>KN 48 Street, Kigali, Rwanda</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+250788793491</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p>Stay tuned for more updates.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Engineering MarketSolution @2024</a>, All
                        Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

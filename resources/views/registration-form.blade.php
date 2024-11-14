<!-- resources/views/student-form.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Register</h3>
                    </div>
                    <!-- Add this in the <head> section of your main layout file -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
                        rel="stylesheet">
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
                            float: right;
                            margin-top: 10%;
                            border: none;
                            border-radius: 1.5rem;
                            padding: 2%;
                            background: #0062cc;
                            color: #fff;
                            font-weight: 600;
                            width: 50%;
                            cursor: pointer;
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
    <div class="container register">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <h2>Engineers Registration Form</h2>

                        @if (session('success'))
                            <div style="color: green;">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('store-engineer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="fname">First Name:</label>
                                <input type="text" name="fname" id="fname" class="form-control form-control-lg" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="lname">Last Name:</label>
                                <input type="text" name="lname" id="lname"  class="form-control form-control-lg"required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email"  class="form-control form-control-lg" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" name="phone" id="phone" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="departement">Departement:</label>
                                <select id="departement" name="departement_id" required>
                                    <option value="">Select a departement</option>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}"
                                            {{ old('departement_id') == $departement->id ? 'selected' : '' }}>
                                            {{ $departement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="cv_path">Upload CV (PDF only):</label>
                                <input type="file" name="cv_path" id="cv_path" accept=".pdf" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="degree_path">Upload Degree Certificate (PDF only):</label>
                                <input type="file" name="degree_path" id="degree_path" accept=".pdf" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="nida_path">Upload ID/Passport (PDF only):</label>
                                <input type="file" name="nida_path" id="nida_path" accept=".pdf" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="experience">Your Experience:</label>
                                <input type="text" name="experience" id="experience" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <h2>Adress Location</h2>
                            </div>
                            <div class="form-group">
                                <label for="province">Province:</label>
                                <select id="province" name="province_id" required>
                                    <option value="">Select a province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}"
                                            {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="district">District:</label>
                                <select id="district" name="district_id" required>
                                    <option value="">Select a province</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}"
                                            {{ old('province_id') == $district->id ? 'selected' : '' }}>
                                            {{ $district->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br><br>
                            </div>

                            <div class="form-group">
                                <label for="sector">Sector:</label>
                                <select id="sector" name="sector_id" required>
                                    <option value="">Select a province</option>
                                    @foreach ($sectors as $sector)
                                        <option value="{{ $sector->id }}"
                                            {{ old('province_id') == $sector->id ? 'selected' : '' }}>
                                            {{ $sector->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="submit">Submit</button>

    </form>

</body>

</html>

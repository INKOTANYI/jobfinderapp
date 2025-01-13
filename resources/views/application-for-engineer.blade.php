@extends('adminlte::page')

@section('title', 'Engineer Registration')

@section('content')
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="logo" />
                <h3>Welcome</h3>
                <p>Apply to join our team of engineers!</p>
            </div>
            <div class="col-md-9 register-right">
                @if (session('success'))
                    <div style="color: green;">{{ session('success') }}</div>
                @endif
                <form action="{{ route('store-engineer') }}" method="POST" enctype="multipart/form-data" id="engineerForm">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Engineers Application Form</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <!-- Personal Information Section -->
                                    <div class="form-group">
                                        <label for="fname">First Name:</label>
                                        <input type="text" name="fname" id="fname" class="form-control"
                                            placeholder="Enter your First Name *" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" name="lname" id="lname" class="form-control"
                                            placeholder="Enter your Last Name *" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Enter your Email *" required>
                                        <span id="emailError" style="color:red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Enter your Phone *" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="experience">Experience:</label>
                                        <input type="text" name="experience" id="experience" class="form-control"
                                            placeholder="Enter your Experience *" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="departement">Departement:</label>
                                        <select id="departement" name="departement_id" class="form-control" required>
                                            <option value="">Select a departement</option>
                                            @foreach ($departements as $departement)
                                                <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Uploads Section -->
                                    <h4>Uploads</h4>
                                    <div class="form-group">
                                        <label for="cv_path">CV (PDF only):</label>
                                        <input type="file" name="cv_path" id="cv_path" accept=".pdf"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="degree_path">Degree Certificate (PDF only):</label>
                                        <input type="file" name="degree_path" id="degree_path" accept=".pdf"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nida_path">ID/Passport (PDF only):</label>
                                        <input type="file" name="nida_path" id="nida_path" accept=".pdf"
                                            class="form-control" required>
                                    </div>
                                    <!-- Address Section -->
                                    <h4>Address</h4>
                                    <div class="form-group">
                                        <label for="province">Province:</label>
                                        <select id="province" name="province_id" class="form-control" required>
                                            <option value="">Select a province</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="district">District:</label>
                                        <select id="district" name="district_id" class="form-control" required>
                                            <option value="">Select a district</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sector">Sector:</label>
                                        <select id="sector" name="sector_id" class="form-control" required>
                                            <option value="">Select a sector</option>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btnRegister">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

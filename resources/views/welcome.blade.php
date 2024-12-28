<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Engineering Market Solution</title>
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
                    <a href="#Home" class="nav-item nav-link active">Home</a>
                    <a href="#AboutUs" class="nav-item nav-link">About</a>

                </div>
                <a href="#ContactUs" class="nav-item nav-link">Contact</a>
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
            </div>

            <div class="nav-item dropdown">

                <div class="navbar-nav ms-auto p-4 p-lg-0">

                    <a href="{{ route('create-application') }}"
                        class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A
                        Application <i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/ai-generated-8806916_1280.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That
                                        You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Join our community today, and take
                                        the first step towards a brighter future!.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <select class="form-select border-0" id="departement">
                                    <option value="">Select Departement</option>
                                    <!-- Options dynamically loaded -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0" id="district">
                                    <option value="">Select District</option>
                                    <!-- Options dynamically loaded -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0" id="sector">
                                    <option value="">Select Sector</option>
                                    <!-- Options dynamically loaded -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100" id="searchBtn">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->

        <div class="container" id="AboutUs">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">About This Platform
            </h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                <div class="container">

                    <p>Engineering Market Solution is a digital platform designed to support the specific needs of
                        engineering professionals, companies, and clients in areas such as project management,
                        collaboration, job matching, and knowledge sharing. This type of web application can serve as a
                        marketplace for engineers, a project management tool, a collaborative platform, or a technical
                        resource hub.</p>

                </div>
            </div>
        </div>


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Engineers By Departement</h1>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                            <h6 class="mb-3">Software Engineering</h6>
                            <p>Total Engineers: {{ $softwareEngineersCount }}</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h6 class="mb-3">Civil Engineering</h6>
                            <p>Total Engineers: {{ $Civil }}</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h6 class="mb-3">Computer Engineering</h6>
                            <p>Total Engineers: {{ $Computer }}</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                            <h6 class="mb-3">Electrical Engineering</h6>
                            <p>Total Engineers: {{ $Electrical }}</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h6 class="mb-3">Networking Engineering</h6>
                            <p>Total Engineers: {{ $Networking }}</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                            <h6 class="mb-3">Electronics Engeneering</h6>
                            <p>Total Engineers: {{ $Electronics }}</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                            <h6 class="mb-3">Construction Engineering</h6>
                            <p>Total Engineers: {{ $Construction }}</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                            <h6 class="mb-3">LandSurveilling </h6>
                            <p>Total Engineers: {{ $landsarveilling }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Engineers By Department</h1>
                <div class="row g-4">
                    <!-- Dynamic Departments Loop -->
                    @foreach ($departments as $department)
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a class="cat-item rounded p-4" href="javascript:void(0)" class="department"
                                data-id="{{ $department->id }}">
                                <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                                <h6 class="mb-3">{{ $department->name }}</h6>
                                <p>Total Engineers: <span
                                        class="engineer-count">{{ $department->engineers_count }}</span></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}

        <!-- Modal -->
        <div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="resultsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resultsModalLabel">Engineers in <span
                                id="department-name"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="engineersTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody id="engineer-list">
                                <!-- Data will populate here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // When a department is clicked
            document.querySelectorAll('.cat-item').forEach(item => {
                item.addEventListener('click', function() {
                    const departmentId = this.getAttribute('data-id');
                    const departmentName = this.querySelector('h6').innerText;
                    document.getElementById('department-name').innerText = departmentName;

                    // Fetch engineers for the clicked department
                    fetch(`/departments/${departmentId}/engineers`)
                        .then(response => response.json())
                        .then(data => {
                            const tableBody = document.getElementById('engineer-list');
                            tableBody.innerHTML = ''; // Clear existing data

                            data.forEach(engineer => {
                                const row = `
                                    <tr>
                                        <td>${engineer.name}</td>
                                        <td>${engineer.email}</td>
                                        <td>${engineer.department.name}</td>
                                        <td>${engineer.address}</td>
                                        <td>${engineer.phone}</td>
                                    </tr>
                                `;
                                tableBody.innerHTML += row;
                            });

                            // Show the modal
                            $('#resultsModal').modal('show');
                        });
                });
            });
        </script>


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">Our Engineers Say!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5" id="ContactUs">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact For Any Query</h1>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                        style="width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <span> KN 48 Street, Kigali, Rwanda</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                        style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-primary"></i>
                                    </div>
                                    <span>info@engineeringmarket solution.com</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                        style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <span>+250788793491</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://maps.google.com/maps?q=kigali,%20kn%2082%20st,%20&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" style="min-height: 400px; border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">

                            @if (session('success'))
                                <div style="color: green;">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Name" value="{{ old('name') }}">
                                            <label for="name">Your Name</label>
                                            @error('name')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Your Email" value="{{ old('email') }}">
                                            <label for="email">Your Email</label>
                                            @error('email')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="subject"
                                                placeholder="Subject" value="{{ old('subject') }}">
                                            <label for="subject">Subject</label>
                                            @error('subject')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" name="message"
                                                style="height: 150px">{{ old('message') }}</textarea>
                                            <label for="message">Message</label>
                                            @error('message')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send
                                            Message</button>
                                    </div>
                                </div>
                            </form>

                            @if (session('success'))
                                <div id="successMessage" style="color: green;">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <!-- Footer Start -->
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
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000); // 3 seconds
            }
        });
    </script>



</body>

</html>

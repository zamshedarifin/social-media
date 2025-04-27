<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{asset('backend/img/favicon.png')}}" rel="icon">
    <link href="{{asset('backend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
</head>

<body>

<main>
    <div class="container-fluid p-0">
      @yield('content')
    </div>

    <footer class="bg-white border-top">
        <div class="container-fluid">
            <!-- First Row: Important Links and Communication -->
            <div class="row mb-4 p-4">
                <!-- Important Links Section -->
                <div class="col-md-6">
                    <h3 class="text-dark fw-bold">Important Links</h3>
                    <ul class="list-unstyled mt-2">
                        <li><a href="#" class="text-primary text-decoration-none">Swisscontact</a></li>
                        <li><a href="#" class="text-primary text-decoration-none">Supported By Switzerland</a></li>
                        <li><a href="#" class="text-primary text-decoration-none">BMMDP</a></li>
                    </ul>
                </div>

                <!-- Communication Section -->
                <div class="col-md-6">
                    <h3 class="text-dark fw-bold">Communication</h3>
                    <ul class="list-unstyled mt-2">
                        <li><a href="#" class="text-primary text-decoration-none">Communication</a></li>
                        <li><a href="#" class="text-primary text-decoration-none">Help Desk</a></li>
                    </ul>
                </div>
            </div>

            <!-- Second Row: Branding and Copyright -->
            <div class="row align-items-center border-top pt-4">
                <!-- Implemented & Supported By Section -->
                <div class="col-md-4 d-flex align-items-center">
                    <img src="{{asset('backend/img/swiss-log.png')}}" alt="Implemented Logo" class="img-fluid me-3"
                         style="height: 40px;">
                    <img src="{{asset('backend/img/implementation.png')}}" alt="Swisscontact Logo" class="img-fluid"
                         style="height: 40px;">
                </div>

                <!-- Copyright Section -->
                <div class="col-md-4 text-center">
                    <p class="text-dark fw-semibold mb-0">Copyright©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , Swiss-contact, All Rights Reserved.
                    </p>
                </div>

                <!-- Designed by Dream71 Section -->
                <div class="col-md-4 d-flex justify-content-md-end align-items-baseline">
                    <span class="text-dark fw-semibold">Designed & Developed By</span>
                    <a href="https://dream71.com" target="_blank" class="ms-2">
                        <img src="{{asset('backend/img/dream71-logo.png')}}" alt="Dream71 Logo" class="img-fluid"
                             style="height: 30px;">
                    </a>
                </div>
            </div>
        </div>
    </footer>

</main><!-- End #main -->
<script src="{{asset('backend/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('backend/js/main.js')}}"></script>
</body>
</html>

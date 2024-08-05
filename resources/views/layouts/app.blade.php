<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNC FOOD PARK</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            padding-top: 1px;
            /* Adjust padding as needed */
            padding-bottom: 1px;
            /* Adjust padding as needed */
            box-shadow: 0 1px 1px rgba(195, 170, 170, 0.1);
            /* Optional: add a subtle shadow */
        }

        .navbar-brand {
            padding-top: 0;
            padding-bottom: 0;
            margin-right: 15px;
            /* Adjust as needed */
        }

        .container {
            margin-top: 0.1px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Replace text with logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="130"
                    class="d-inline-block align-top">
            </a>
            <!-- End replacement -->

            <!-- Rest of the navbar -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto" style="font-size: 18px;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"
                            style="color: #ffffff; padding: 5px 10px; transition: background-color 0.3s;">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurant-staff.index') }}"
                            style="color: #ffffff; padding: 5px 10px; transition: background-color 0.3s;">
                            Our Staffs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers.index') }}"
                            style="color: #ffffff; padding: 5px 10px; transition: background-color 0.3s;">
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('food-items.index') }}"
                            style="color: #ffffff; padding: 5px 10px; transition: background-color 0.3s;">
                            Food Items
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('food-orderings.index') }}"
                            style="color: #ffffff; padding: 5px 10px; transition: background-color 0.3s;">
                            Food Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('food-deliverings.index') }}"
                            style="color: #ffffff; padding: 5px 10px; transition: background-color 0.3s;">
                            Food Delivery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('invoices.index') }}"
                            style="color: #ffffff; padding: 5px 10px; transition: background-color 0.3s;">
                            Invoices
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payments.index') }}"
                            style="color: #ffffff; padding: 5px 10px; transition: background-color 0.3s;">
                            Payments
                        </a>
                    </li>
                </ul>
            </div>

            <style>
                .navbar-nav .nav-link:hover {
                    background-color: #0056b3;
                    color: #ffffff;
                }
            </style>

        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    {{-- <footer class="footer bg-dark text-white text-center py-1">
        <div class="container">
            <span>&copy; 2024 PNC FOOD PARK. All rights reserved.</span>
        </div>
    </footer> --}}

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

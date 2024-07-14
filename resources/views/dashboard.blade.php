@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-column" style="height: 60vh;">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand font-weight-bold" href="{{ route('dashboard') }}">PNC Food Park - Dashboard</a>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <div class="row mt-4">
                <!-- Customer Management -->
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card bg-info text-white shadow rounded-lg h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title font-weight-bold">Customer Management</h5>
                            <p class="card-text flex-grow-1">Enhance customer experience with personalized interactions.</p>
                        </div>
                    </div>
                </div>

                <!-- Staff Management -->
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card bg-primary text-white shadow rounded-lg h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title font-weight-bold">Staff Management</h5>
                            <p class="card-text flex-grow-1">Manage your restaurant staff efficiently -Anish Regmi</p>
                        </div>
                    </div>
                </div>

                <!-- Food Items Management -->
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card bg-warning text-dark shadow rounded-lg h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title font-weight-bold">Food Items Management</h5>
                            <p class="card-text flex-grow-1">Curate your menu with seasonal and popular dishes.</p>
                        </div>
                    </div>
                </div>

                <!-- Food Orders -->
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card bg-danger text-white shadow rounded-lg h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title font-weight-bold">Food Orders</h5>
                            <p class="card-text flex-grow-1">Efficiently manage and track food orders.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Customer Orders Chart -->
                <div class="col-lg-4">
                    <div class="card bg-light shadow rounded-lg h-80">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Customer Orders</h5>
                            <canvas id="customerOrdersChart" width="100%" height="105"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Revenue Chart -->
                <div class="col-lg-4">
                    <div class="card bg-light shadow rounded-lg h-80">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Revenue</h5>
                            <canvas id="revenueChart" width="100%" height="105"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Profit Chart -->
                <div class="col-lg-4">
                    <div class="card bg-light shadow rounded-lg h-80">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Profit</h5>
                            <canvas id="profitChart" width="100%" height="105"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Chart.js from CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Script to initialize and update charts -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Example data, replace with your actual data
                var customerOrdersData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Customer Orders',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120]
                    }]
                };

                var revenueData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1,
                        data: [1000, 1200, 1500, 1300, 1700, 1600, 1900, 2000, 2200, 2500, 2700, 3000]
                    }]
                };

                var profitData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Profit',
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1,
                        data: [500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 1600]
                    }]
                };

                // Configure and render Customer Orders Chart
                var customerOrdersCtx = document.getElementById('customerOrdersChart').getContext('2d');
                new Chart(customerOrdersCtx, {
                    type: 'bar',
                    data: customerOrdersData,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Configure and render Revenue Chart
                var revenueCtx = document.getElementById('revenueChart').getContext('2d');
                new Chart(revenueCtx, {
                    type: 'line',
                    data: revenueData,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Configure and render Profit Chart
                var profitCtx = document.getElementById('profitChart').getContext('2d');
                new Chart(profitCtx, {
                    type: 'line',
                    data: profitData,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    @endsection

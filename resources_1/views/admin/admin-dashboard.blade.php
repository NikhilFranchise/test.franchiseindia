@extends('admin.layout.master')
@section('DA', 'active')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
        #insights-chart,
        #users-chart {
            min-height: 300px;
            max-height: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #insights-chart:hover,
        #users-chart:hover,
        .card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        #content-header {
            margin-top: -35px;
        }

        #user-nav>ul {
            margin: -5px;
        }

        #user-nav>ul>li>a {
            font-size: 12px;
        }
    </style>
@endpush
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url()->current() }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a></div>
    </div>
    <!--End-breadcrumbs-->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Insights Chart -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Insights</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            @php
                                $lastMonth = end($insightsChart);
                                $totalCurrent =
                                    $lastMonth['Article'] +
                                    $lastMonth['News'] +
                                    $lastMonth['Interview'] +
                                    $lastMonth['Report'] +
                                    $lastMonth['Event'];
                                // $lastMonth['Others'];
                                $prevMonth = prev($insightsChart);
                                $totalPrevious = $prevMonth
                                    ? $prevMonth['Article'] +
                                        $prevMonth['News'] +
                                        $prevMonth['Interview'] +
                                        $prevMonth['Report'] +
                                        $prevMonth['Event']
                                    : // $prevMonth['Others']
                                    0;
                                $insightsPercentage =
                                    $totalPrevious > 0
                                        ? round((($totalCurrent - $totalPrevious) / $totalPrevious) * 100, 1)
                                        : 0;
                            @endphp
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">{{ $totalCurrent }}</span>
                                <span>Insights Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="{{ $insightsPercentage >= 0 ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $insightsPercentage >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                    {{ $insightsPercentage }}%
                                </span>
                                <span class="text-muted">vs previous month</span>
                            </p>
                        </div>

                        <div class="position-relative mb-4">
                            <canvas id="insights-chart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Users</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            @php
                                $totalUsers = end($usersChart)['count'];
                                $prevUsers = prev($usersChart)['count'] ?? 0;
                                $userGrowth =
                                    $prevUsers > 0 ? round((($totalUsers - $prevUsers) / $prevUsers) * 100, 1) : 0;
                            @endphp
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">{{ $totalUsers }}</span>
                                <span>Users Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="{{ $userGrowth >= 0 ? 'text-success' : 'text-danger' }}">
                                    <i class="fas {{ $userGrowth >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                    {{ $userGrowth }}%
                                </span>
                                <span class="text-muted">vs previous month</span>
                            </p>
                        </div>
                        <div class="position-relative mb-4">
                            <canvas id="users-chart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Insights Line Chart ---
            const insightsLabels = @json(array_map(fn($i) => $i['month'], $insightsChart));
            const articleData = @json(array_map(fn($i) => $i['Article'], $insightsChart));
            const newsData = @json(array_map(fn($i) => $i['News'], $insightsChart));
            const interviewData = @json(array_map(fn($i) => $i['Interview'], $insightsChart));
            const reportData = @json(array_map(fn($i) => $i['Report'], $insightsChart));
            const eventData = @json(array_map(fn($i) => $i['Event'], $insightsChart));
            // const othersData = @json(array_map(fn($i) => $i['Others'], $insightsChart));

            new Chart(document.getElementById('insights-chart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: insightsLabels,
                    datasets: [{
                            label: 'Article',
                            data: articleData,
                            borderColor: '#007bff',
                            backgroundColor: 'rgba(0,123,255,0.2)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'News',
                            data: newsData,
                            borderColor: '#28a745',
                            backgroundColor: 'rgba(40,167,69,0.2)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'Interview',
                            data: interviewData,
                            borderColor: '#ffc107',
                            backgroundColor: 'rgba(255,193,7,0.2)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'Report',
                            data: reportData,
                            borderColor: '#17a2b8',
                            backgroundColor: 'rgba(23,162,184,0.2)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'Event',
                            data: eventData,
                            borderColor: '#dc3545', // Bootstrap red
                            backgroundColor: 'rgba(220,53,69,0.2)', // Transparent red
                            fill: true,
                            tension: 0.3
                        },
                        // {
                        //     label: 'Others',
                        //     data: othersData,
                        //     borderColor: '#6c757d',
                        //     backgroundColor: 'rgba(17, 17, 17, 0.2)',
                        //     fill: true,
                        //     tension: 0.3
                        // }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // --- Users Bar Chart ---
            const userLabels = @json(array_map(fn($u) => $u['month'], $usersChart));
            const userData = @json(array_map(fn($u) => $u['count'], $usersChart));

            new Chart(document.getElementById('users-chart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: userLabels,
                    datasets: [{
                        label: 'Users',
                        data: userData,
                        backgroundColor: 'rgba(23, 93, 184, 0.96)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                html: `{!! preg_replace(
                    [
                        '/Welcome Back (.*?)!/i', // Capture full name
                        '/You are logged in as (.*?)(\.|!)/i', // Capture role before . or !
                    ],
                    ['Welcome Back <b>$1</b>!<br>', 'You are logged in as <span style="color:#007bff;font-weight:bold;">$1</span>$2'],
                    session('success'),
                ) !!}`,
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                background: '#f0f9f4',
                color: '#155724',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
    @endif
    @if (session('warning'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: `{!! session('warning') !!}`,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: `{!! session('error') !!}`,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif
@endpush

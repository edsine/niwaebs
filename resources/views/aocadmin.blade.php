@extends('layouts.app')

<style>
    body {
        font-family: sans-serif;
        font-size: 14px;
    }

    .container {
        border: 1px solid #a0a0a0;
        border-radius: 4px;
        padding: 16px;
        margin: 30px auto;
        width: 800px;
    }

    #map-area {
        width: 504px;
        margin: 0 auto;
    }
</style>

@section('content')
    <!--begin::Content wrapper-->
    <!-- partial -->
    <div class="content-wrapper">
        {{-- <center> --}}
        <h1 class="uppercase bold mb-5">Area Office Coordination (Headquaters)</h1>
        {{-- </center> --}}


        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Active Projects</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Completion Rate</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class="ml-1 mb-0">Updated: 05:42pm</small>
                                    </div>

                                </div>

                            </div>
                            <div class="d-inline-block">
                                {{-- <i class="fas fa-shopping-cart text-danger icon-lg"></i> --}}
                                <span class="m-3 badge badge-outline-success badge-pill">0% increase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-facebook btn-rounded">
                                    <i class="fas fa-user"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Officers</h5>
                                    <p class="mb-0">0</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-twitter btn-rounded">
                                    <i class="fa fa-building"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Departments</h5>
                                    <p class="mb-0">0</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-google btn-rounded">
                                    <i class="fas fa-user"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Clients</h5>
                                    <p class="mb-0">0</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-social-icon btn-linkedin btn-rounded">
                                    <i class="fas fa-fighter-jet"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Private Jets</h5>
                                    <p class="mb-0">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row grid-margin">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-table mr-2"></i>
                                    Desk Utilization
                                </p>
                                <h6>Total Desks: 0</h6>
                                <h6>Used Desks: 0</h6>
                                <label class="badge badge-outline-success badge-pill">Remaining Desks: 1000</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-computer mr-2"></i>
                                    Computer Utilization
                                </p>
                                <h6>Total Computers: 0</h6>
                                <h6>Used Computers: 0</h6>
                                <label class="badge badge-outline-success badge-pill">Remaining Computers: 1000</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Main Facility Utilization Metrics
                                </p>
                                <h6>Condition: Good</h6>
                                <label class="badge badge-outline-success badge-pill">Usage: 0%</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Second Facility Utilization Metrics
                                </p>
                                <h6>Structure Condition: Good</h6>
                                <label class="badge badge-outline-success badge-pill">Usage: 0%</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <h4 class="card-title">
                            <i class="fas fa-gift"></i>
                            Client Distribution Chart
                        </h4>
                        <canvas id="orders-chart" width="681" height="340"
                            style="display: block; height: 272px; width: 545px;" class="chartjs-render-monitor"></canvas>
                        <div id="orders-chart-legend" class="orders-chart-legend">
                            <ul class="legend0">
                                <li><span class="legend-label" style="background-color:#392c70"></span>Registered</li>
                                <li><span class="legend-label" style="background-color:#d1cede"></span>Active</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <h4 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Debt Analysis
                        </h4>
                        <h2 class="mb-5">0<span class="text-muted h4 font-weight-normal">debtors</span></h2>
                        <canvas id="sales-chart" width="681" height="340"
                            style="display: block; height: 272px; width: 545px;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">
                            <i class="fas fa-chart-pie"></i>
                            Project Distribution
                        </h4>
                        <h2 class="mb-5">0<span class="text-muted h4 font-weight-normal">Total Projects</span></h2>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="sales-status-chart" class="mt-3 chartjs-render-monitor" width="425"
                                height="212" style="display: block; height: 170px; width: 340px;"></canvas>
                            <div class="pt-4">
                                <div id="sales-status-chart-legend" class="sales-status-chart-legend">
                                    <ul class="legend2">
                                        <li><span class="legend-label"
                                                style="background-color:#392c70"></span>Completed<label
                                                class="badge badge-light badge-pill legend-percentage ml-auto">75%</label>
                                        </li>
                                        <li><span class="legend-label" style="background-color:#04b76b"></span>In
                                            Progress<label
                                                class="badge badge-light badge-pill legend-percentage ml-auto">25%</label>
                                        </li>
                                        <li><span class="legend-label" style="background-color:#ff5e6d"></span>On
                                            Hold<label
                                                class="badge badge-light badge-pill legend-percentage ml-auto">15%</label>
                                        </li>
                                        <li><span class="legend-label"
                                                style="background-color:#eeeeee"></span>Cancelled<label
                                                class="badge badge-light badge-pill legend-percentage ml-auto">10%</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">
                            <i class="fas fa-tachometer-alt"></i>
                            Document Distribution Overview
                        </h4>
                        <p class="card-description">Document Distribution Overview per month</p>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="daily-sales-chart" class="mt-3 mb-3 mb-md-0 chartjs-render-monitor"
                                width="425" height="212"
                                style="display: block; height: 170px; width: 340px;"></canvas>
                            <div id="daily-sales-chart-legend" class="daily-sales-chart-legend pt-4 border-top">
                                <ul class="legend3">
                                    <li><span class="legend-label" style="background-color:#392c70"></span>Standard
                                        Operating Procedures (SOPs)</li>
                                    <li><span class="legend-label" style="background-color:#04b76b"></span>Environmental
                                        Impact Assessments (EIAs)</li>
                                    <li><span class="legend-label" style="background-color:#e9e8ef"></span>Project Reports
                                    </li>
                                    <li><span class="legend-label" style="background-color:#ff5e6d"></span>Other Document
                                        Types</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Folders</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Files</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        <small class="ml-1 mb-0">Updated: 05:42pm</small>
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Locations</h4>
                        <div class="container">
                            <div class="mapcontainer mapeal-example-1">
                                <div id="map-area">
                                    <div class="map">
                                        <span>Alternative content for the map</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Example 2</h4>
                        <div class="container">
                            <div class="mapcontainer mapeal-example-2 bg-blue">
                                <div class="map">
                                    <span>Alternative content for the map</span>
                                </div>
                                <div class="ml-auto">
                                    <div class="population float-left mr-5">
                                        <span>Alternative content for the legend</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>


        <div class="row grid-margin">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-user mr-2"></i>
                                    Number Of Employee
                                </p>
                                <h2>{{ $staff }}</h2>
                                <label class="badge badge-outline-success badge-pill">0% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                                    Staff On Leave
                                </p>
                                <h2>0</h2>
                                <label class="badge badge-outline-success badge-pill">0% decrease</label>
                            </div>
                            {{-- <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Average Time to Hire
                                </p>
                                <h2>0 hour</h2>
                                <label class="badge badge-outline-success badge-pill">0% increase</label>
                            </div> --}}
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-check-circle mr-2"></i>
                                    Training Completed

                                </p>
                                <h2>0</h2>
                                <label class="badge badge-outline-success badge-pill">0% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-chart-line mr-2"></i>
                                    Employee Satisfaction Score
                                </p>
                                <h2>0%</h2>
                                <label class="badge badge-outline-success badge-pill">0% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                    Top Training Programs
                                </p>
                                <h2>0</h2>
                                <label class="badge badge-outline-danger badge-pill">0% decrease</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">STAFF ON LEAVE</h4>

                        <div class="row">
                            <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                <table id="sortable-table-1" class="table">
                                    <thead>
                                        <tr>
                                            <th class="sortStyle">Employee ID<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">First Name<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">Last Name<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">Date of Departure<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">Reason<i class="fa fa-angle-down"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sulaiman</td>
                                            <td>Ajishape</td>
                                            <td>12/12/2023</td>
                                            <td>Travel</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Thrent</td>
                                            <td>David</td>
                                            <td>01/12/2023</td>
                                            <td>Child Birth</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Samuel</td>
                                            <td>Andrew</td>
                                            <td>29/09/2023</td>
                                            <td>Education</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>James</td>
                                            <td>Alex</td>
                                            <td>24/12/2022</td>
                                            <td>Travel</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!--end::Content wrapper-->
@endsection
<script>
    let table = new DataTable('sortable-table-1');
    let tablee = new DataTable('table table-bordered');
</script>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endpush

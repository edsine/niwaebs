@extends('layouts.app')

@section('content')
    <!--begin::Content wrapper-->
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-user mr-2"></i>
                                    Employee Turnover Rate
                                </p>
                                <h2>5400</h2>
                                <label class="badge badge-outline-success badge-pill">89.7% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                                    Number of New Hires
                                </p>
                                <h2>100</h2>
                                <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Average Time to Hire
                                </p>
                                <h2>140 hours</h2>
                                <label class="badge badge-outline-success badge-pill">12% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-check-circle mr-2"></i>
                                    Percentage of Employees Completed Training

                                </p>
                                <h2>950</h2>
                                <label class="badge badge-outline-success badge-pill">57% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-chart-line mr-2"></i>
                                    Overall Employee Satisfaction Score
                                </p>
                                <h2>67%</h2>
                                <label class="badge badge-outline-success badge-pill">10% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                    Top Training Programs
                                </p>
                                <h2>70</h2>
                                <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Revenue</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">#2,310,000,200.00</h2>
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
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Expenses</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">#921,200,056.00</h2>
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
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Net Profit</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">#1,103,000,200.00</h2>
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
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Profit Margin Percentage</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <label class="badge badge-outline-danger badge-pill">30% decrease</label>
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
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Overall Budget Utilization Percentage</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <label class="badge badge-outline-danger badge-pill">67% decrease</label>
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
            <div class="col-md-4 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Variances in Key Budget Categories</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">2778</h2>
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Budget vs Actuals</h4>
                        {{-- <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Planned Budget
                                        </th>
                                        <th>
                                            Actual Expenditure
                                        </th>
                                        <th>
                                            Variance
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Salaries
                                        </td>
                                        <td>
                                            # 960,000,000.00
                                        </td>
                                        <td>
                                            # 780,000,000.00
                                        </td>
                                        <td>
                                            # 190,000,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Marketing
                                        </td>
                                        <td>
                                            # 370,000,000.00
                                        </td>
                                        <td>
                                            # 196,000,000.00
                                        </td>
                                        <td>
                                            #80,000,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Marketing
                                        </td>
                                        <td>
                                            # 370,000,000.00
                                        </td>
                                        <td>
                                            # 196,000,000.00
                                        </td>
                                        <td>
                                            #80,000,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Marketing
                                        </td>
                                        <td>
                                            # 370,000,000.00
                                        </td>
                                        <td>
                                            # 196,000,000.00
                                        </td>
                                        <td>
                                            #80,000,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Marketing
                                        </td>
                                        <td>
                                            # 370,000,000.00
                                        </td>
                                        <td>
                                            # 196,000,000.00
                                        </td>
                                        <td>
                                            #80,000,000.00
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                                <h6>Total Desks: 3000</h6>
                                <h6>Used Desks: 2000</h6>
                                <label class="badge badge-outline-success badge-pill">Remaining Desks: 1000</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-computer mr-2"></i>
                                    Computer Utilization
                                </p>
                                <h6>Total Computers: 2000</h6>
                                <h6>Used Computers: 1500</h6>
                                <label class="badge badge-outline-success badge-pill">Remaining Computers: 1000</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Main Facility Utilization Metrics
                                </p>
                                <h6>Condition: Good</h6>
                                <label class="badge badge-outline-success badge-pill">Usage: 12%</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                    Second Facility Utilization Metrics
                                </p>
                                <h6>Structure Condition: Good</h6>
                                <label class="badge badge-outline-success badge-pill">Usage: 48%</label>
                            </div>
                            {{-- <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-chart-line mr-2"></i>
                                    Overall Employee Satisfaction Score
                                </p>
                                <h2>67%</h2>
                                <label class="badge badge-outline-success badge-pill">10% increase</label>
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                    Top Training Programs
                                </p>
                                <h2>70</h2>
                                <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Basic Sortable Table</h4>
                        <p class="page-description">Add class <code>.sortable-table</code></p>
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


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endpush

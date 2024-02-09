@php
    $departmentData = getDepartmentData();
@endphp

<style>
    .sub-menu,
    .sub-sub-menu {
        display: none;
        padding-left: 20px;
    }

    .nav-link span{
        font-size: larger!important;
    }
    .nav-link {
        font-size: larger;
    }
    
</style>

<!-- partial:partials/_sidebar.html -->
<nav class="sidebar-text  sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    @if (auth()->user()->staff && auth()->user()->staff->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->staff->profile_picture) }}"
                            alt="{{ auth()->user()->staff->profile_picture }}">
                    @else
                        <img src="assets/media/avatars/300-1.jpg" alt="image" />
                    @endif
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ 'Welcome,' . ' ' . $user->first_name . ' ' . $user->last_name }}
                    </p>
                    <p class="designation">
                        {{ auth()->user()->roles->isNotEmpty()? auth()->user()->roles->pluck('name')->first(): 'no role yet' }}
                    </p>
                </div>
            </div>
        </li>

        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">

                <li class="nav-item">
                    <a class="nav-link" href="">Marine Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Engineering Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">finance and account
                        Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Audit Dashboard</a>
                </li>
            </ul>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link"data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts" href="{{ route('home') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <div class="collapse" id="page-layouts">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                href="pages/layout/boxed-layout.html">HR Dashboard</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/layout/rtl-layout.html">Admin
                                Dashboard</a></li>
                        <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                href="pages/layout/horizontal-menu.html">Project Dashboard</a></li>
                    </ul>
                </div>
            </a>
        </li> --}}

       {{--  <li class="nav-item">
            <a class="nav-link" href="{{ route('niwa.payments') }}">
                <i class="fa fa-list menu-icon"></i>
                <span class="menu-title">Payments</span>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('document.index') }}">
                <i class="fa fa-list menu-icon"></i>
                <span class="menu-title">Client Documents</span>

            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('serviceApplications.index') }}">
                <i class="fa fa-compass menu-icon"></i>
                <span class="menu-title">Service Applications</span>

            </a>
        </li>
        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-check menu-icon"></i>
                <span class="menu-title">Approval</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('request.index') }}">Approval Request</a>
                </li>
                
               {{--  @if(Auth()->user()->hasRole('super-admin')) --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('appraisal.index') }}">Appraisal</a>
    </li>
{{-- @endif --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('type.index') }}">Types</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('niwa.payments') }}">
                       Payments Approval
        
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('document.index') }}">
                        Documents Approval
        
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-file menu-icon"></i>
                <span>Report</span>
            </a>
        </li>

        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-tasks menu-icon"></i>
                <span class="menu-title">Operational Task</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" id="myTaskLayouts">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users menu-icon"></i>
                        <span class="menu-title">HRM System</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        <li class="nav-item" id="myTaskLayouts">
                            <a class="nav-link" href="#">
                                <i class="fas fa-wallet menu-icon"></i>
                                <span class="menu-title">Payroll Setup</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <ul class="nav flex-column sub-sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('setsalary.index') }}">Set Salary</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('payslip.index') }}">Payslip</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item" id="myTaskLayouts">
                            <a class="nav-link" href="#">
                                <i class="fas fa-wallet menu-icon"></i>
                                <span class="menu-title">Leave Management</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <ul class="nav flex-column sub-sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('leave_request.create') }}">Apply for Leave</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('leave_request.index') }}">Leave Status</a>
                                </li>
                                
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('leave.index') }}">Manage Leave</a>
                                </li> --}}
                                <li class="nav-item" id="myTaskLayouts">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-wallet menu-icon"></i>
                                        <span class="menu-title">Attendance</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <ul class="nav flex-column sub-sub-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('attendanceemployee.index') }}">Mark Attendance</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('attendanceemployee.bulkattendance') }}">Bulk Attendance</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item" id="myTaskLayouts">
                            <a class="nav-link" href="#">
                                <i class="fas fa-wallet menu-icon"></i>
                                <span class="menu-title">Performance Setup</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <ul class="nav flex-column sub-sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('indicator.index') }}">Indicator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('appraisal_index.index') }}">Appraisal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('goaltracking.index') }}">Goal Tracking</a>
                                </li>
                                
                            </ul>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item" id="myTaskLayouts">
                    <a class="nav-link" href="#">
                        <i class="fas fa-wallet menu-icon"></i>
                        <span class="menu-title">Accounting System</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        <li class="nav-item" id="myTaskLayouts">
                            <a class="nav-link" href="#">
                                <i class="fas fa-wallet menu-icon"></i>
                                <span class="menu-title">Banking</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <ul class="nav flex-column sub-sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('bank-account.index') }}">Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('bank-transfer.index') }}">Transfer</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item" id="myTaskLayouts">
                            <a class="nav-link" href="#">
                                <i class="fas fa-wallet menu-icon"></i>
                                <span class="menu-title">Income</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <ul class="nav flex-column sub-sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('revenue.index') }}">Revenue</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('credit.note') }}">Credit Note</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item" id="myTaskLayouts">
                            <a class="nav-link" href="#">
                                <i class="fas fa-wallet menu-icon"></i>
                                <span class="menu-title">Purchases</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <ul class="nav flex-column sub-sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('bill.index') }}">Bill</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('expense.index') }}">Expense</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('payments.index') }}">Payment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('debit.note') }}">Debit Note</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" id="myTaskLayouts">
                            <a class="nav-link" href="#">
                                <i class="fas fa-wallet menu-icon"></i>
                                <span class="menu-title">Double Entry</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <ul class="nav flex-column sub-sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('chart-of-account.index') }}">Chart Of Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('journal-entry.index') }}">Journal Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('report.ledger') }}">Ledger Summary</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('report.balance.sheet') }}">Balance Sheet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('report.profit.loss') }}">Profit & Loss</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('trial.balance') }}">Trial Balance</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('budget.index') }}">
                                <i class="fas fa-file menu-icon"></i>
                                <span>Budget Planner</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('goal.index') }}">
                                <i class="fas fa-file menu-icon"></i>
                                <span>Financial Goal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productservice.index') }}">
                                <i class="fas fa-file menu-icon"></i>
                                <span>Product & Services</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('taxes.index') }}">
                                <i class="fas fa-file menu-icon"></i>
                                <span>Accounting Setup</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('print.setting') }}">
                                <i class="fas fa-file menu-icon"></i>
                                <span>Print Settings</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </li>

        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">My Task</span>
                <i class="menu-arrow"></i>
            </a>

            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('units.create') }}">
                        <i class="fas fa-balance-scale menu-icon"></i>
                        <span>Add New Unit</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('units.index') }}">
                        <i class="fas fa-check-square menu-icon"></i>
                        <span>Unit List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dtarequests.create') }}">
                        <i class="fas fa-code-pull-request menu-icon"></i>
                        <span>New DTA Requests</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dtarequests.index') }}">
                        <i class="fas fa-bars menu-icon"></i>
                        <span>My DTA Applications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dtareview.index') }}">
                        <i class="fas fa-star menu-icon"></i>
                        <span>View Reviewed DTA</span>
                    </a>
                </li>
                <li class="nav-item" id="myTaskLayouts">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-archive menu-icon"></i>
                        <span class="menu-title">File Manager</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">File Type</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('folders.index') }}">Folders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('memos.index') }}">Memos</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('documents.index') }}">Documents</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Sidebar Fixed</a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item" id="myTaskLayouts">
                    <a class="nav-link" href="#">
                        <i class="fab fa-intercom menu-icon"></i>
                        <span class="menu-title">Intercom</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Mail</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- <li class="nav-item" id="myTask1">
            <a class="nav-link" href="#">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Internal Processes</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" id="myTaskLayouts1">
                    <a class="nav-link" href="#">
                        <i class="fas fa-columns menu-icon"></i>
                        <span class="menu-title">My Task Layouts</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        @if (in_array(Auth()->user()->staff->department_id, $departmentData['departmentIdsToCheck1']))
                            @include('employermanager::layouts.menu')
                        @endif
                    </ul>
                </li>
            </ul>
        </li> --}}


        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Approval</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                            href="pages/layout/boxed-layout.html">Approval Type</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/layout/rtl-layout.html">Approval List</a></li>
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                            href="pages/layout/horizontal-menu.html">Appraisal</a></li>
                </ul>
            </div>
        </li> --}}

    </ul>
</nav>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myTaskItems = document.querySelectorAll('#myTask, #myTaskLayouts');

        myTaskItems.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.stopPropagation();

                // Toggle sub-menu visibility
                var subMenu = item.querySelector('.sub-menu');
                if (subMenu) {
                    subMenu.style.display = subMenu.style.display === 'block' ? 'none' :
                        'block';
                }

                // Check if it's a sub-sub-menu item
                if (!item.querySelector('.sub-sub-menu')) {
                    // Toggle sub-sub-menu visibility if it exists
                    var subSubMenu = item.querySelector('.sub-sub-menu');
                    if (subSubMenu) {
                        subSubMenu.style.display = subSubMenu.style.display === 'block' ?
                            'none' : 'block';
                    }
                }
            });
        });

        // Add event listener for sub-menu items
        var subMenuItems = document.querySelectorAll('.sub-menu .nav-link');
        subMenuItems.forEach(function(subMenuItem) {
            subMenuItem.addEventListener('click', function(event) {
                event.stopPropagation();

                // Toggle sub-sub-menu visibility for sub-menu items
                var subSubMenu = subMenuItem.nextElementSibling;
                if (subSubMenu && subSubMenu.classList.contains('sub-sub-menu')) {
                    subSubMenu.style.display = subSubMenu.style.display === 'block' ? 'none' :
                        'block';
                }
            });
        });
    });
</script>

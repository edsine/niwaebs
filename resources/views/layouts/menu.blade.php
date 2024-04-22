@php
    $departmentData = getDepartmentData();
@endphp

<style>
    .sub-menu,
    .sub-sub-menu {
        display: none;
        padding-left: 20px;
    }

    .nav-link span {
        font-size: larger !important;
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
                        <img src="assets/media/avatars/images.jpeg" alt="image" />
                    @endif
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ 'Welcome,' . ' ' . $user->first_name . ' ' . $user->last_name }}
                    </p>
                    <p class="designation">
                        {{ auth()->user()->roles->isNotEmpty() ? auth()->user()->roles->pluck('name')->first() : 'no role yet' }}
                    </p>
                </div>
            </div>
        </li>
        @can('view overview module')
        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-home menu-icon"></i>
                <span class="menu-title">Overview</span>

                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">
                @can('view md dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('md') }}">MD Overview</a>
                    </li>
                @endcan
                @can('view area office coordination')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aocadmin') }}">Area Office Cord. Overview</a>
                    </li>
                @endcan
                @can('view areamanager dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('am') }}">Area Manager Overview</a>
                    </li>
                @endcan

                @can('view marine dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('marineadmin') }}">Marine Overview</a>
                    </li>
                @endcan


                @can('view engineering dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('engineering') }}">Engineering Overview</a>
                    </li>
                @endcan

                @can('view finance and account dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('financeadmin') }}">finance and account
                            Overview</a>
                    </li>
                @endcan

                @can('view audit dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="auditadmin">Audit Overview</a>
                    </li>
                @endcan

                @can('view corporate affairs dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('copaffairs') }}">Corporate Affairs Overview</a>
                    </li>
                @endcan

                @if (auth()->user()->hasRole('super-admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payhistory') }}">MASS PAYMENT RECORD UPLOAD</a>
                    </li>
                @endif

            </ul>

        </li>
        @endcan
        @can('view user managment module')

            @if (auth()->check() && (in_array(auth()->user()->staff->department_id, [13]) || auth()->user()->hasRole('super-admin')))
                <li class="nav-item" id="myTask">
                    <a class="nav-link" href="#">
                        <i class="bi bi-tools menu-icon"></i>

                        <span class="menu-title">User Management</span>
                        <i class="menu-arrow"></i>

                    </a>
                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employers.index') }}">Clients</a>
                        </li>

                    </ul>

                </li>
            @endif

        @endcan


        @can('view service applications module')
            @if (auth()->check() &&
                    (in_array(auth()->user()->staff->department_id, [1, 5, 4]) || auth()->user()->hasRole('super-admin')))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('serviceApplications.index') }}">
                        <i class="fa fa-compass menu-icon"></i>
                        <span class="menu-title">Service Applications</span>

                    </a>
                </li>
            @endif
        @endcan

        @can('view approval module')
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


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('appraisal.index') }}">Appraisal</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('type.index') }}">Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('niwa.payments') }}">
                            Payments Approval

                        </a>
                    </li>

                </ul>
            </li>
        @endcan

        @can('view service application setup module')
            <li class="nav-item" id="myTask">
                <a class="nav-link" href="#">
                    <i class="fas fa-check menu-icon"></i>
                    <span class="menu-title">Service Application Setup</span>
                    <i class="menu-arrow"></i>
                </a>
                <ul class="nav flex-column sub-menu">


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}">Service Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sub-services.index') }}">Sub-Service Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registration_fee.index') }}">Registration fee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('application_form_fee.index') }}">Application Fee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('document_upload.index') }}">Document Upload Name</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('processing_type.index') }}">Processing Service Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('processing_fee.index') }}">Processing Fee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inspection_fee.index') }}">Inspection Fee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipmentAndFees.index') }}">Demand Notice</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}">Service Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sub-services.index') }}">Sub-Service Type</a>
                    </li>
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration_fee.index') }}">Registration fee</a>
                </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('application_form_fee.index') }}">Application Fee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('document_upload.index') }}">Document Upload Name</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('processing_type.index') }}">Processing Service Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('processing_fee.index') }}">Processing Fee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inspection_fee.index') }}">Inspection Fee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipmentAndFees.index') }}">Demand Notice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('change.signature') }}">Sign Signature</a>
                    </li>



                </ul>
            </li>
        @endcan


        @if (auth()->check() && (in_array(auth()->user()->staff->department_id, [2]) || auth()->user()->hasRole('super-admin')))
            <!-- Start Of REport System Menu -->
            @include('accounting::layouts.reportmenu')
            <!-- End Of REport System Menu -->
        @endif



        @can('view operational task module')
            <li class="nav-item" id="myTask">
                <a class="nav-link" href="#">
                    <i class="fas fa-tasks menu-icon"></i>
                    <span class="menu-title">Operational Task</span>
                    <i class="menu-arrow"></i>
                </a>
                <ul class="nav flex-column sub-menu">



                    <!-- Start Of HRM System Menu -->
                    @include('hrmsystem::layouts.menu')

                    <!-- End Of HRM System Menu -->


                    @if (auth()->check() &&
                            (in_array(auth()->user()->staff->department_id, [4, 5, 3]) || auth()->user()->hasRole('super-admin')))
                        <!-- End Of Accounting Menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('equipmentAndFees.index') }}">
                                <i class="fas  fa-pen-square menu-icon"></i>
                                <span>Add/View Equipments</span>
                            </a>
                        </li>
                    @endif


                    @if (auth()->check() &&
                            (in_array(auth()->user()->staff->department_id, [2, 7]) || auth()->user()->hasRole('super-admin')))
                        <!-- Start Of Accounting Menu -->
                        @include('accounting::layouts.menu')
                        <!-- End Of Accounting Menu -->
                    @endif



                </ul>
            </li>
        @endcan





        @if (auth()->check() &&
                (in_array(auth()->user()->staff->department_id, [11, 12, 10]) || auth()->user()->hasRole('super-admin')))
            <li class="nav-item" id="myTask">
                <a class="nav-link" href="#">
                    <i class="fas  fa-file-word menu-icon"></i>
                    <span class="menu-title">Projects </span>
                    <i class="menu-arrow"></i>
                </a>
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects.index') }}">Manage Project </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('taskBoard.view', 'list') }}">Tasks </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('timesheet.list') }}">{{ __('Timesheet') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bugs.view', 'list') }}">{{ __('Bug') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('task.calendar', ['all']) }}">{{ __('Task Calendar') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('time.tracker') }}">Tracker </a>
                    </li>
                    <li
                        class="nav-item  {{ Request::route()->getName() == 'project_report.index' || Request::route()->getName() == 'project_report.show' ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('project_report.index') }}">{{ __('Project Report') }}</a>
                    </li>

                    <li class="nav-item nav-hasmenu">
                        <a class="nav-link" href="#">{{ __('Project System Setup') }}<span
                                class="nav-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="nav-submenu">
                            {{-- @can('manage project task stage') --}}
                            <li class="nav-item ">
                                <a class="nav-link"
                                    href="{{ route('project-task-stages.index') }}">{{ __('Project Task Stages') }}</a>
                            </li>
                            {{-- @endcan --}}
                            {{-- @can('manage bug status') --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('bugstatus.index') }}">{{ __('Bug Status') }}</a>
                            </li>
                            {{-- @endcan --}}
                        </ul>
                    </li>



                </ul>

            </li>
        @endif



        @if (auth()->check() && (auth()->user()->staff->department_id == 11 || auth()->user()->hasRole('super-admin')))
            <li class="nav-item" id="myTask">
                <a class="nav-link" href="#">
                    <i class="fas  fa-cart-flatbed menu-icon"></i>
                    <span class="menu-title">Procurement </span>
                    <i class="menu-arrow"></i>
                </a>
                <ul class="nav flex-column sub-menu">

                    @if (auth()->check() &&
                            (in_array(auth()->user()->staff->department_id, [11, 7, 12]) || auth()->user()->hasRole('super-admin')))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vendors.index') }}">VENDORS</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('procurement.index') }}">MY REQUISITION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('unit.proc') }}">SUPER.REQUISITION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hod.proc') }}">MY DEPARTMENTAL REQUESITION.</a>
                    </li>
                    @if (auth()->check() && (in_array(auth()->user()->staff->department_id, [7]) || auth()->user()->hasRole('super-admin')))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('audit.proc') }}">AUDIT. REQUESITION.</a>
                        </li>
                    @endif

                    @if (auth()->check() && (in_array(auth()->user()->staff->department_id, [12]) || auth()->user()->hasRole('super-admin')))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('legal.proc') }}">LEGAL. REQUESITION.</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('md.proc') }}">MD. REQUESITION.</a>
                    </li>
                    @if (auth()->check() && (in_array(auth()->user()->staff->department_id, [2]) || auth()->user()->hasRole('super-admin')))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fin.proc') }}">FINANCE. REQUESITION.</a>
                        </li>
                    @endif



                </ul>

            </li>
        @endif

        @if (auth()->user() && auth()->user()->hasRole('super-admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('support.index') }}">
                    <i class="fa fa-gear menu-icon"></i>
                    <span class="menu-title">Support System</span>

                </a>
            </li>
        @endif

        @can('view asset manager module')
            @if (auth()->check() &&
                    (in_array(auth()->user()->staff->department_id, [4, 5, 3, 13]) || auth()->user()->hasRole('super-admin')))
                <li class="nav-item" id="myTask">
                    <a class="nav-link" href="#">
                        <i class="fas  fa-passport menu-icon"></i>
                        <span class="menu-title">Asset Manager</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-menu">


                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('asset/home') }}"><?php echo trans('lang.dashboard'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('assetlist') }}"><?php echo trans('lang.assetmenu'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('componentlist') }}"><?php echo trans('lang.componentmenu'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('maintenancelist') }}"><?php echo trans('lang.maintenancemenu'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('assettypelist') }}"><?php echo trans('lang.assettypemenu'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('brandlist') }}"><?php echo trans('lang.brandmenu'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('supplierlist') }}"><?php echo trans('lang.suppliermenu'); ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('locationlist') }}"><?php echo trans('lang.locationmenu'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('reports/allreports') }}"><?php echo trans('lang.reportmenu'); ?></a>
                        </li>



                    </ul>
                </li>
            @endif
        @endcan


        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas  fa-id-card-clip menu-icon"></i>
                <span class="menu-title">Documents</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">
                {{--  @can('read asset manager dashboard') --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dash') }}"><i class="fas  fa-dashboard "></i>
                        Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents_manager.shareduser') }}">My
                        Documents</a>
                </li>
                {{--  <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents_manager.sharedrole') }}">Official
                        Documents</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents_manager.index') }}">All Documents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents_category.index') }}">Files</a>
                </li>
                @if (auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('MANAGING DIRECTOR'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('documents_manager.audits') }}">Document Audit Trail</a>
                    </li>
                @endif
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('reminder.index') }}"> <i
                            class="bi bi-alarm "></i>Reminder</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('loginaudit') }}"> <i class="fas fa-door-open "></i>Login
                        Audit</a>
                </li>
            </ul>
        </li>

       
       
        @can('view incoming documents module')
        
            <li class="nav-item" id="myTask">
                <a class="nav-link" href="#">
                    <i class="fas  fa-id-card-clip menu-icon"></i>
                    <span class="menu-title">Incoming Documents</span>
                    <i class="menu-arrow"></i>
                </a>

                <ul class="nav flex-column sub-menu">

                    @if (auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('SECRETARY'))
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('incoming_documents_manager.all_documents.secretary') }}">Incoming
                                Documents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('incoming_documents_category.index') }}">Files</a>
                        </li>
                    @endif



                    @can('view incoming documents')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('incoming_documents_manager.shareduser') }}">My
                                Documents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('incoming_documents_manager.index') }}">All Documents</a>
                        </li>
                        @if (auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('SECRETARY'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('incoming_documents_manager.all_documents.secretary') }}">Incoming/Manual
                                    Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('incoming_documents_category.index') }}">Files</a>
                            </li>
                        @endif


                        @can('view incoming documents')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('incoming_documents_manager.shareduser') }}">My
                                    Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('incoming_documents_manager.index') }}">Received Documents</a>
                            </li>
                        @endcan

                        @if (auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('MANAGING DIRECTOR'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('incoming_documents_manager.audits') }}">Document Audit
                                    Trail</a>
                            </li>
                        @endif
@endcan

                    </ul>
                </li>
            @endcan



        </ul>
        </li>

        </ul>
        </li>




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

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
                        <img src="assets/media/avatars/blank.png" alt="image" />
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

        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">
                @can('view md dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('md') }}">MD Dashboard</a>
                    </li>
                @endcan
                @can('view area office coordination')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aocadmin') }}">Area Office CORD. Dashboard</a>
                    </li>
                @endcan
                @can('view areamanager dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('am') }}">Area Manager Dashboard</a>
                    </li>
                @endcan
                @can('view marine dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('marineadmin') }}">Marine Dashboard</a>
                    </li>
                @endcan
                @can('view engineering dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('engineering') }}">Engineering Dashboard</a>
                    </li>
                @endcan
                @can('view finance and account dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('financeadmin') }}">finance and account
                            Dashboard</a>
                    </li>
                @endcan
                @can('view audit dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="auditadmin">Audit Dashboard</a>
                    </li>
                @endcan
                @can('view corporate affairs dashboard')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('copaffairs') }}">Corporate Affairs Dashboard</a>
                    </li>
                @endcan
            </ul>

        </li>

        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="bi bi-tools menu-icon"></i>

                <span class="menu-title">System Step</span>
                <i class="menu-arrow"></i>

            </a>
            <ul class="nav flex-column sub-menu">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
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

                {{--  @if (Auth()->user()->hasRole('super-admin')) --}}
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

        <!-- Start Of REport System Menu -->
        @include('accounting::layouts.reportmenu')
        <!-- End Of REport System Menu -->

        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-tasks menu-icon"></i>
                <span class="menu-title">Operational Task</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">


                @if (auth()->check() && (auth()->user()->staff->department_id == 1 || auth()->user()->hasRole('super-admin')))
                    <!-- Start Of HRM System Menu -->
                    @include('hrmsystem::layouts.menu')
                @endif
                <!-- End Of HRM System Menu -->

                <!-- Start Of Accounting Menu -->
                @include('accounting::layouts.menu')
                <!-- End Of Accounting Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipmentAndFees.index') }}">
                        <i class="fas fa-balance-scale menu-icon"></i>
                        <span>Add/View Equipments</span>
                    </a>
                </li>

                <!-- Start Of Accounting Menu -->
                @include('accounting::layouts.menu')
                <!-- End Of Accounting Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipmentAndFees.index') }}">
                        <i class="fas fa-balance-scale menu-icon"></i>
                        <span>Add/View Equipments</span>
                    </a>
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
                    <a class="nav-link" href="{{ route('document.create') }}">
                        <i class="fas fa-balance-scale menu-icon"></i>
                        <span>DAR</span>
                    </a>
                </li>
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
                        @if (auth()->check() &&
                                (in_array(auth()->user()->staff->department_id, [1, 7]) || auth()->user()->hasRole('super-admin')))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('folders.index') }}">Folders</a>
                            </li>
                        @endif

                        @if (auth()->check() && in_array(auth()->user()->staff->department_id, [1, 4]))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('memos.index') }}">Memos</a>
                            </li>
                        @endif
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

        @if (auth()->check() &&
                (in_array(auth()->user()->staff->department_id, [1, 10, 5, 4, 7]) || auth()->user()->hasRole('super-admin')))
            <li class="nav-item" id="myTask">
                <a class="nav-link" href="#">
                    <i class="fas fa-home menu-icon"></i>
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
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('hod.proc') }}">MY DEPARTMENTAL REQUESITION.</a>
                </li> --}}
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('audit.proc') }}">AUDIT. REQUESITION.</a>
                </li> --}}
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('legal.proc') }}">LEGAL. REQUESITION.</a>
                </li> --}}
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('md.proc') }}">MD. REQUESITION.</a>
                </li> --}}
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('fin.proc') }}">FINANCE. REQUESITION.</a>
                </li> --}}



                </ul>

            </li>
        @endif

        @if (auth()->check() && (auth()->user()->staff->department_id == 11 || auth()->user()->hasRole('super-admin')))
            <li class="nav-item" id="myTask">
                <a class="nav-link" href="#">
                    <i class="fas fa-home menu-icon"></i>
                    <span class="menu-title">Procurement </span>
                    <i class="menu-arrow"></i>
                </a>
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendors.index') }}">Vendors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('procurement.index') }}">MY REQUISITION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('unit.proc') }}">SUPER.REQUISITION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hod.proc') }}">MY DEPARTMENTAL REQUESITION.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('audit.proc') }}">AUDIT. REQUESITION.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('legal.proc') }}">LEGAL. REQUESITION.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('md.proc') }}">MD. REQUESITION.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fin.proc') }}">FINANCE. REQUESITION.</a>
                    </li>



                </ul>

            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ route('support.index') }}">
                <i class="fa fa-gear menu-icon"></i>
                <span class="menu-title">Support System</span>

            </a>
        </li>
        @if (auth()->check() && (in_array(auth()->user()->staff->department_id, [4, 3, 6])  || auth()->user()->hasRole('super-admin')))
            <li class="nav-item" id="myTask">
                <a class="nav-link" href="#">
                    <i class="fas fa-check menu-icon"></i>
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

                    {{--  @can('read asset manager dashboard') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('asset/home') }}"><?php echo trans('lang.dashboard'); ?></a>
                    </li>
                    {{-- @endcan
                @can('read assets') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('assetlist') }}"><?php echo trans('lang.assetmenu'); ?></a>
                    </li>
                    {{-- @endcan
                @can('read components') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('componentlist') }}"><?php echo trans('lang.componentmenu'); ?></a>
                    </li>
                    {{--  @endcan
                @can('read maintenances') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('maintenancelist') }}"><?php echo trans('lang.maintenancemenu'); ?></a>
                    </li>
                    {{-- @endcan
                @can('read asset types') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('assettypelist') }}"><?php echo trans('lang.assettypemenu'); ?></a>
                    </li>
                    {{-- @endcan
                @can('read brands') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('brandlist') }}"><?php echo trans('lang.brandmenu'); ?></a>
                    </li>
                    {{--  @endcan
                @can('read suppliers') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('supplierlist') }}"><?php echo trans('lang.suppliermenu'); ?></a>
                    </li>
                    {{--  @endcan
                @can('read locations') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('locationlist') }}"><?php echo trans('lang.locationmenu'); ?></a>
                    </li>
                    {{--  @endcan
                @can('read asset manager reports') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('reports/allreports') }}"><?php echo trans('lang.reportmenu'); ?></a>
                    </li>
                    {{--  @endcan --}}


            </ul>
        </li>
        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-check menu-icon"></i>
                <span class="menu-title">Document Manager</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">
               {{--  @can('read asset manager dashboard') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dash')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('documents_manager.documentsByUsers')}}">Assigned Documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('documents_manager.index')}}">All Documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('documents_category.index')}}">Document Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('documents_manager.audits')}}">Document Audit Trail</a>
                    </li>
            </ul>
        </li>

                </ul>
            </li>
        @endif
        
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

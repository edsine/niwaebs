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
                        <img src="assets/media/avatars/300-1.jpg" alt="image" />
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

                <!-- Start Of HRM System Menu -->
                @include('hrmsystem::layouts.menu')
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

        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-home menu-icon"></i>
                <span class="menu-title">PROJECT MANAGER</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.index') }}">Manage Project </a>
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
        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-home menu-icon"></i>
                <span class="menu-title">PROCUREMENT MANAGER</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">

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
        <li class="nav-item">
            <a class="nav-link" href="{{ route('support.index') }}">
                <i class="fa fa-gear menu-icon"></i>
                <span class="menu-title">Support System</span>

            </a>
        </li>
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

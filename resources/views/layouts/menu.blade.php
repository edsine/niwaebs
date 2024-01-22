@php
    $departmentData = getDepartmentData();
@endphp

<style>
    .sub-menu,
    .sub-sub-menu {
        display: none;
        padding-left: 20px;
    }
</style>

<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
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
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">

                <li class="nav-item">
                    <a class="nav-link" href="">Marine Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/layout/sidebar-hidden.html">Engineering Dashboard</a>
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

        <li class="nav-item">
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
        </li> 
        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Approval</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">

                <li class="nav-item">
                    <a class="nav-link" href="">Approval Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Payment Approval</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Document Approval</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Appraisal</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-book menu-icon"></i>
                <span>Report</span>
            </a>
        </li>

        <li class="nav-item" id="myTask">
            <a class="nav-link" href="#">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Operational Task</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" id="myTaskLayouts">
                    <a class="nav-link" href="#">
                        <i class="fas fa-columns menu-icon"></i>
                        <span class="menu-title">Human resource</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/compact-menu.html">Apply for Leave</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Leave Status</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" id="myTaskLayouts">
                    <a class="nav-link" href="#">
                        <i class="fas fa-columns menu-icon"></i>
                        <span class="menu-title">Finance and Account</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/compact-menu.html">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Payments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/sidebar-hidden.html">Permits and Licences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Operators Certification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/sidebar-fixed.html">Request Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/sidebar-fixed.html">Accident Notification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/sidebar-fixed.html">Spare Parts Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/sidebar-fixed.html">Certificate Renewal</a>
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
                <li class="nav-item" id="myTaskLayouts">
                    <a class="nav-link" href="#">
                        <i class="fas fa-columns menu-icon"></i>
                        <span class="menu-title">File Manager</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/compact-menu.html">File Type</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Uploads</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/sidebar-hidden.html">List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Folders</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="pages/layout/sidebar-fixed.html">Sidebar Fixed</a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
            
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" id="myTaskLayouts">
                    <a class="nav-link" href="#">
                        <i class="fas fa-columns menu-icon"></i>
                        <span class="menu-title">Intercom</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <ul class="nav flex-column sub-sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/layout/compact-menu.html">Chat</a>
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

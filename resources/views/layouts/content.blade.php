<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    @include('layouts.toolbar')
    <!--end::Toolbar-->
    <!--begin::Notification Messages-->
    @include('layouts.messages')
    <!--end::Notification Messages-->
    <!--begin::Content-->
    @yield('content')
    <!--end::Content-->
</div>
<!--end::Content wrapper-->

@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        {{-- Sweet-alert --}}
        @include('flash::message')
        {{-- end::Sweet-alert --}}

        <!--begin::Row-->
        @php
            $departmentId = optional(auth()->user()->staff)->department_id;
        // dd($departmentId);
        @endphp

@includeWhen($departmentId == 1, 'hradmin')
@includeWhen($departmentId == 2, 'financeadmin')
@includeWhen($departmentId == 3, 'marineadmin')
@includeWhen($departmentId == 4, 'engineering')
@includeWhen($departmentId == 5, 'surveyadmin')
@includeWhen($departmentId == 6, 'portsandenvironment')
@includeWhen($departmentId == 7, 'auditadmin')
{{-- @includeWhen($departmentId == 8, 'policeadmin') --}}
@includeWhen($departmentId == 8, 'policeadmin')
@includeWhen($departmentId == 9, 'coordinationadmin')

@includeWhen($departmentId == 10, 'projectadmin')
@includeWhen($departmentId == 11, 'procurementadmin')
@includeWhen($departmentId == 12, 'legalsadmin')



@includeWhen($departmentId == 13, 'ictadmin')
@includeWhen($departmentId == 14, 'businessdevadmin')
        @include('defaultdashboard')
    </div>
@endsection

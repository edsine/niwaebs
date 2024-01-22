@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        {{-- Start::Sweet-alert --}}
        @include('flash::message')
        {{-- end::Sweet-alert --}}
        <!--begin::Row-->
        @if (auth()->user()->staff != null)
            @if (auth()->user()->staff->department_id == 14)
                @include('businessdevadmin')

            @elseif (auth()->user()->staff->department_id == 1)
                @include('hradmin')
            @elseif (auth()->user()->staff->department_id == 2)
                @include('financeadmin')
                @elseif (auth()->user()->staff->department_id == 3)
                    @include('marineadmin')
            @elseif (auth()->user()->staff->department_id == 4)
                @include('engineering')
                @elseif (auth()->user()->staff->department_id == 5)
                    @include('surveyadmin')
                @elseif (auth()->user()->staff->department_id == 6)
                    @include('portsandenvironment')

            @elseif (auth()->user()->staff->department_id == 7)
                @include('auditadmin')
            @elseif (auth()->user()->staff->department_id == 8)
                @include('policeadmin')
                
            @elseif (auth()->user()->staff->department_id == 9)
                @include('coordinationadmin')
            @elseif (auth()->user()->staff->department_id == 10)
                @include('projectadmin')
            @elseif (auth()->user()->staff->department_id == 11)
                @include('procurementadmin')
            @elseif (auth()->user()->staff->department_id == 12)
                @include('legalsadmin')


            @elseif (auth()->user()->staff->department_id == 13)
                 @include('ictadmin')


           
            @else
                @include('defaultdashboard')
            @endif
        @else
            @include('defaultdashboard')
        @endif
    </div>
@endsection

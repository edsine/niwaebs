@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employees</h1>
                </div>
                {{-- <div class="col-sm-6 float-end">
                    <a class="btn btn-primary float-left"
                       href="{{ route('employer.create-employees',  $employer->id) }}">
                        Add New
                    </a>
                    <a class="btn btn-default float-right"
                       href="{{ route('employers.index') }}">Back</a>
                </div> --}}

            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <form method="get" action="" class="navbar-search mr-4">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ \Request::get('search', '') }}"
                                class="form-control bg-light border-0 small" placeholder="@lang('Search Employees list..')" aria-label="Search"
                                aria-describedby="basic-addon2">

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('employermanager::employers.employee_table')
        </div>
    </div>

@endsection

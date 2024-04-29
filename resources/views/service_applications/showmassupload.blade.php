@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">Service Applications History</h4>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('serviceupload') }}" class="btn btn-success float-end"> Upload Record</a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            {{-- @include('service_applications.table') --}}
            <div class="card-body p-5">
                <div class="table-responsive">
                    <table class="table align-middle gs-0 gy-4" id="">
                        <thead>
                            <tr>
                                <th class="min-w-200px">Applicant</th>
                                <th class="min-w-200px">Service</th>
                                <th class="min-w-200px">Application Form Payment Status</th>
                                <th class="min-w-200px">Date of Inspection</th>
                                <th class="min-w-200px">Service Type</th>


                                {{-- <th class="min-w-120px" colspan="1">Action</th> --}}
                                {{-- <th class="min-w-200px text-end rounded-end"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serviceApplications as $serviceApplication)
                                <tr class="fw-bold text-muted bg-light">
                                    <td>{{ $serviceApplication->employer()->company_name }}</td>
                                    <td>{{ $serviceApplication->service ? $serviceApplication->service->name : '' }}</td>
                                    <td>{{ $serviceApplication->application_form_payment_status ? 'Paid' : 'Not Paid' }}
                                    </td>
                                    <td>{{ $serviceApplication->date_of_inspection }}</td>
                                    <td>{{ $serviceApplication->service_type_id == 'mechanical' ? 'Mechanical' : 'Manual' }}
                                    </td>

                                    {{-- <td style="width: 120px">
                                        <div class='btn-group'>
                                            <a href="{{ route('serviceApplications.show', [$serviceApplication->id]) }}"
                                                class='btn btn-default btn-xs' title="View & Make Service Approvals">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </div>
                                        <div class='btn-group'>
                                            <a href="{{ route('map.show', [$serviceApplication->id]) }}"
                                                class='btn btn-default btn-xs'>
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                        </div>
                                    </td> --}}
                                    {{-- <th class="min-w-200px text-end rounded-end"></th> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', [
                            'records' => $serviceApplications,
                        ])
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

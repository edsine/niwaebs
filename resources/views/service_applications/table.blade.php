<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="order-listing">
            <thead>
                <tr>
                    <th class="min-w-200px">Employer</th>
                    <th class="min-w-200px">Service</th>
                    <th class="min-w-200px">Application Form Payment Status</th>
                    <th class="min-w-200px">Date Of Inspection</th>
                    <th class="min-w-200px">Service Type</th>
                    <th class="min-w-200px">Status Summary</th>
                    <th class="min-w-200px">Created</th>
                    <th class="min-w-120px" colspan="1">Action</th>
                    <th class="min-w-200px text-end rounded-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($serviceApplications as $serviceApplication)
                    <tr class="fw-bold text-muted bg-light">
                        <td>{{$serviceApplication->employer()->company_name}}</td>
                        <td>{{ $serviceApplication->service ? $serviceApplication->service->name : '' }}</td>
                        <td>{{ $serviceApplication->application_form_payment_status ? 'Paid' : 'Not Paid' }}</td>
                        <td>{{ $serviceApplication->date_of_inspection }}</td>
                        <td>{{ $serviceApplication->service_type_id == 'mechanical' ? 'Mechanical' : 'Manual' }}</td>
                        <td>{{ $serviceApplication->status_summary }}</td>
                        <td>{{ $serviceApplication->created_at }}</td>
                        <td style="width: 120px">
                            <div class='btn-group'>
                                <a href="{{ route('serviceApplications.show', [$serviceApplication->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                        </td>
                        <th class="min-w-200px text-end rounded-end"></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $serviceApplications])
        </div>
    </div>
</div>

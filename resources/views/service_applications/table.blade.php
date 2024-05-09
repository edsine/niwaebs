<div class="content px-3">
    <div class="clearfix"></div>
    <div class="card-body p-5">
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-4" id="order-listing">
                    <thead>
                        <tr>
                            <th>S/N</th>
                    <th class="min-w-100px">Client</th>
                    <th class="">Service</th>
                    <th class="">Application Form Payment Status</th>
                    <th class="">Date Of Inspection</th>
                    <th class="">Service Type</th>
                    <th class="">Status Summary</th>
                    <th class="">Created</th>
                    <th class="" colspan="1">Action</th>
                    <th class="text-end rounded-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($serviceApplications  as $index => $serviceApplication)
                <tr>
                    <td>{{ $index + 1 }}</td>
                        <td>{{$serviceApplication->employer() ? $serviceApplication->employer()->company_name : 'NILL'}}</td>
                        <td>{{ $serviceApplication->theservice ? $serviceApplication->theservice->name : '' }}</td>
                        <td>{{ $serviceApplication->application_form_payment_status ? 'Paid' : 'Not Paid' }}</td>
                        <td>{{ $serviceApplication->date_of_inspection }}</td>
                        <td>{{ $serviceApplication->service_type_id == 'mechanical' ? 'Mechanical' : 'Manual' }}</td>
                        <td>{{ $serviceApplication->status_summary }}</td>
                        <td>{{ $serviceApplication->created_at }}</td>
                        <td style="width: 120px">
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
                        </td>
                        <th class=" text-end rounded-end"></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div></div>

    
</div>

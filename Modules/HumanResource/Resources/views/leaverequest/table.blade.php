<div class="card-body">
   
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table" id="order-listing">
                    <thead>
                        <tr>
                            <th> STATFF ID</th>
                            <th>TYPE OF LEAVE</th>
                            <th> LEAVE DATE</th>
                            <th>NUMBER OF DAYS</th>
                            <th>RESUMPTION DATE</th>
                            <th>STATUS</th>

                            <th colspan="3">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($leaverequest as $leaves)
                            <tr>

                                <td>{{ $leaves->id }}</td>
                                <td>{{ $leaves->leavetype ? $leaves->leavetype->name : '' }}</td>

                                <td>{{ $leaves->date_start_new }}</td>
                                <td>{{ $leaves->daystaken }}</td>

                              
                                <td>{{ $leaves->end_date }}</td>
                                <td>
                                    @if ($leaves->status==1)
                                    <span>Awaiting GM Approval</span>
                                    @elseif ($leaves->status==2)
                                    <span>Awaiting  HR GM Approval</span>
                                    @elseif ($leaves->status==3) 
                                    <span class=" text-success"> Leave Approved</span>
                                    @endif
                                </td>
                                {{-- <td style="width: 120px">
                                    {!! Form::open(['route' => ['leave_request.destroy', $leaves->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('leave_request.show', [$leaves->id]) }}"
                                            class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('leave_request.edit', [$leaves->id]) }}"
                                            class='btn btn-default btn-xs' title="MAKE APPROVAL">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                                    </div>
                                    {!! Form::close() !!}
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $leaverequest])
        </div>
    </div>
</div>

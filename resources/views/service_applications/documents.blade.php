<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="service-applications-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">S/N</th>
                    <th class="min-w-200px">Document Name</th>
                    <th class="min-w-200px">Document (PDF)</th>
                    <th class="min-w-200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($documents as $document)
                    <tr class="fw-bold text-muted bg-light">
                        <td>
                            @php
                                echo $no++;
                            @endphp
                        </td>
                        <td>{{ $document->name }}</td>
                        <td>
                            <a href="{{ 'storage/' . $document->path }}" target="_blank">
                                View PDF
                            </a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['application.approve.document', $document->id], 'method' => 'post']) !!}
                            <div class='btn-group'>

                                <input type="hidden" name="selected_button" id="selected_button_input">

                                {!! Form::button('Decline', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "setSelectedStatus('decline')",
                                ]) !!}

                                {!! Form::button('Approve', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-success btn-xs',
                                    'onclick' => "setSelectedStatus('approve')",
                                ]) !!}

                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $documents])
        </div>
    </div>
</div>


<script>
    function setSelectedStatus(value) {
        document.getElementById('selected_button_input').value = value;
        return confirm('Are you sure?');
    }
</script>

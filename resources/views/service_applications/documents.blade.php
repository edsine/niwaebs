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
                            {!! Form::open([
                                'route' => ['application.approve.document', $document->id],
                                'method' => 'post',
                                'id' => 'document_approval_form',
                            ]) !!}
                            <div class='btn-group'>

                                <input type="hidden" name="selected_button" value="approve" id="selected_button_input">

                                @if ($document->approval_status == 1)
                                    {!! Form::button('Decline', [
                                        'type' => 'button',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "setSelectedStatusSingleDocument('decline')",
                                    ]) !!}
                                @endif

                                @if ($document->approval_status == 0)
                                    {!! Form::button('Approve', [
                                        'type' => 'button',
                                        'class' => 'btn btn-success btn-xs',
                                        'onclick' => "setSelectedStatusSingleDocument('approve')",
                                    ]) !!}
                                @endif

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
    function setSelectedStatusSingleDocument(value) {
        document.getElementById('selected_button_input').value = value;
        let confirmation = confirm("Are you sure you want to proceed?");
        if (confirmation) {
            document.getElementById('document_approval_form').submit(); // Submit the form
        }
    }
</script>

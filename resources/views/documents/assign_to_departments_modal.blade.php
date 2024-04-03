<!-- Modal -->
<div class="modal fade" id="assignToDepartmentsModal" tabindex="-1" role="dialog"
    aria-labelledby="assignToDepartmentsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => 'memos.assignToDepartments']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign to Departments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="col-form-label text-right">Select Department(s)</label>
                    <select class="form-control select2" id="department_select" name="departments[]"
                        multiple="multiple">
                    </select>
                </div>

                <!-- Memo Id Field -->
                {!! Form::hidden('memo_id', null, ['id' => 'department_memo_id']) !!}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


@push('page_scripts')
    <script>
        $(document).ready(function() {

            $("#department_select").select2({
                placeholder: "Search for department",
                minimumInputLength: 2,
                allowClear: true,
                ajax: {
                    url: "{{ url('api/shared/departments') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: {
                                department_unit: params.term
                            },
                            limit: 10 // Number of departments per page
                        };
                    },
                    processResults: function(data, params) {

                        var options = [];
                        $.each(data.data, function(index, department) {
                            options.push({
                                id: department.id,
                                text: department.department_unit
                            });
                        });

                        return {
                            results: options,
                        };
                    },
                    cache: true
                },
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
            });
        })
    </script>
@endpush

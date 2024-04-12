<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service:') !!}
    {!! Form::select('service_id', $services, null, ['class' => 'form-control custom-select', 'id' => 'service_id']) !!}
</div>

<!-- Sub Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_service_id', 'Sub-Service:') !!}
    {!! Form::select('sub_service_id', [], null, ['class' => 'form-control custom-select', 'id' => 'sub_service_id']) !!}
</div>

        <div class="form-group col-sm-6">
            <div class="form-control-wrap">
                <div class="form-icon form-icon-right">
                    <em class="icon ni ni-user"></em>
                </div>
                <label class="form-label-outlined" for="branch_id">Area Office</label>
                <select class="form-control" name="branch_id" id="branch_id" required>
                    <option value="">Select Area Office</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" {{ old('branch_id', isset($service) && $service->branch_id == $branch->id ? 'selected' : '') }}>
                            {{ $branch->branch_name }}
                        </option>
                    @endforeach
                </select>
                
            </div>
        </div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Metric Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metric', 'Metric:') !!}
    {!! Form::select('metric', enum_equipment_fees_metrics(), null, ['class' => 'form-control custom-select']) !!}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
    $('#service_id').change(function () {
        var serviceId = $(this).val();
        if (serviceId) {
            $.ajax({
                type: "GET",
                url: "/subservice/" + serviceId + "/subservice-types",
                success: function (data) {
                    $('#sub_service_id').empty();
                    if (data.length > 0) {
                        $.each(data, function (key, value) {
                            $('#sub_service_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#sub_service_id').append('<option value="0">No result</option>');
                    }
                     // Trigger change event to set the selected value
                $('#sub_service_id').trigger('change');
                }
            });
        } else {
            $('#sub_service_id').empty();
        }
    });
});
</script>
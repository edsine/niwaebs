<div class="form-group col-sm-6">
    <div class="form-control-wrap">
        <div class="form-icon form-icon-right">
            <em class="icon ni ni-user"></em>
        </div>
        <label class="form-label-outlined" for="branch_id">Location</label>
        <select class="form-control" name="branch_id" id="branch_id" required>
            <option value="">Select Location</option>
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}" >
                    {{ $branch->branch_name }}
                </option>
            @endforeach
        </select>
        
    </div>
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    <div class="form-group">
        <div class="form-control-wrap">
            <div class="form-icon form-icon-right">
                <em class="icon ni ni-user"></em>
            </div>
            <label class="form-label-outlined" for="service_id">Select A Service</label>
            <select class="form-control" name="service_id" id="service_id">
                <option value="">Select Service</option>
            </select>
            
        </div>
    </div>
</div>

<!-- Sub Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_service_id', 'Sub-Service:') !!}
    {!! Form::select('sub_service_id', [], null, ['class' => 'form-control custom-select', 'id' => 'sub_service_id']) !!}
</div>

        

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name (Equipment, tools and measurement):') !!}
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
        $('.loader-demo-box1').show();
        if (serviceId) {
            $.ajax({
                type: "GET",
                url: "/subservice/" + serviceId + "/subservice-types",
                success: function (data) {
                    $('.loader-demo-box1').hide();
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
            $('.loader-demo-box1').hide();
            $('#sub_service_id').empty();
        }
    });
});
</script>
<script>
    $(document).ready(function () {
    $('#branch_id').change(function () {
        var branchId = $(this).val();
        $('.loader-demo-box1').show();
         if (branchId) {
            $.ajax({
                type: "GET",
                url: "/services/" + branchId + "/get-services",
                success: function (data) {
                    $('.loader-demo-box1').hide();
                    $('#service_id').empty();
                    if (data.length > 0) {
                        $.each(data, function (key, value) {
                            $('#service_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#service_id').append('<option value="0">No result</option>');
                    }
                     // Trigger change event to set the selected value
                $('#service_id').trigger('change');
                }
            });
        } else {
            $('.loader-demo-box1').hide();
            $('#service_id').empty();
        }
    });
});
</script>
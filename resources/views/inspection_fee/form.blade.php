<div class="preview-block">
    
    <div class="row gy-4 mt-5">
        <div class="col-md-12">
            <div class="col-lg-4 col-sm-6 ml-3">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                            <em class="icon ni ni-user"></em>
                        </div>
                        <label class="form-label-outlined" for="service_id">Select A Service</label>
                        <select class="form-control" name="service_id" id="service_id">
                            <option value="">Select Service</option>
                            @foreach($services as $service)
                               <option value="{{ $service->id }}" {{ old('service_id', isset($inspection_fee) && $inspection_fee->service_id == $service->id ? 'selected' : '') }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-lg-4 col-sm-6 ml-4">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                            <em class="icon ni ni-user"></em>
                        </div>
                        <label class="form-label-outlined" for="branch_id">Area Office</label>
                        <select class="form-control" name="branch_id" id="branch_id" required>
                            <option value="">Select Area Office</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ old('branch_id', isset($inspection_fee) && $inspection_fee->branch_id == $branch->id ? 'selected' : '') }}>
                                    {{ $branch->branch_name }}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-lg-4 col-sm-6 ml-3">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                            <em class="icon ni ni-user"></em>
                        </div>
                        <label class="form-label-outlined" for="processing_type_id">Processing Service Type</label>
                        <select class="form-control" name="processing_type_id" id="processing_type_id">
                            <option>Select Service Type</option>
                        </select>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 ml-4">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="name">Inspection Fee</label>
                    <input type="number" class="form-control form-control-xl form-control-outlined"
                        id="amount" name="amount" value="{{old('amount', $inspection_fee->amount ?? '')}}">
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="row g-4 ml-4">
        <div class="col-2">
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block"><em
                        class="icon ni ni-save me-2"></em> SUBMIT</button>
            </div>
        </div>
    </div>
</div>
{{-- @push('scripts') --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
    $('#branch_id').change(function () {
        var branchId = $(this).val();
         if (branchId) {
            $.ajax({
                type: "GET",
                url: "/services/" + branchId + "/processing-types",
                success: function (data) {
                    $('#processing_type_id').empty();
                    if (data.length > 0) {
                        $.each(data, function (key, value) {
                            $('#processing_type_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#processing_type_id').append('<option value="0">No result</option>');
                    }
                     // Trigger change event to set the selected value
                $('#processing_type_id').trigger('change');
                }
            });
        } else {
            $('#processing_type_id').empty();
        }
    });
});
</script>
{{-- @endpush --}}
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
                        <select class="form-control" name="service_id">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id', isset($processing_type) && $processing_type->service_id == $service->id ? 'selected' : '') }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
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
                    <label class="form-label-outlined" for="name">Processing Type Name</label>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="name" name="name" value="{{old('name', $processing_type->name ?? '')}}">
                    
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
                    <label class="form-label-outlined" for="branch_id">Select Area Office</label>
                    <select class="form-control" name="branch_id">
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id', isset($service) && $service->branch_id == $branch->id ? 'selected' : '') }}>
                                {{ $branch->branch_name }}
                            </option>
                        @endforeach
                    </select>
                    
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

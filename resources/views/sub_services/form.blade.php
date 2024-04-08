<div class="preview-block ml-4">
    
   
    <div class="row gy-4">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <label class="form-label-outlined" for="outlined-select">Select Service:</label>
                    <select class="form-select js-select2" data-ui="xl" id="state_of_origin1"
                        name="service_id" data-search="on" required>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" @selected(old('service_id', $subservices->service_id ?? '')==$service->id)>{{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-4">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="branch_id">Area Office</label>
                    <select class="form-control" name="branch_id" id="branch_id">
                        <option>Select Area Office</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id', isset($subservices) && $subservices->branch_id == $branch->id ? 'selected' : '') }}>
                                {{ $branch->branch_name }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>
    </div>
<div class="row gy-4">
    <div class="col-lg-4 col-sm-6">
        <div class="form-group">
            <div class="form-control-wrap">
                <div class="form-icon form-icon-right">
                    <em class="icon ni ni-user"></em>
                </div>
                <label class="form-label-outlined" for="name">Name of Sub-Service</label>
                <input type="text" class="form-control form-control-xl form-control-outlined"
                    id="name" name="name" value="{{old('name', $subservices->name ?? '')}}">
                
            </div>
        </div>
    </div>
</div>
    <hr class="preview-hr">
    <div class="row g-4">
        <div class="col-2">
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block"><em
                        class="icon ni ni-save me-2"></em> SUBMIT</button>
            </div>
        </div>
    </div>
</div>

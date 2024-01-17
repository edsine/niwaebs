<div class="preview-block">
    
    <div class="row gy-4">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="name">Name of Service</label>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="name" name="name" value="{{old('name', $service->name ?? '')}}">
                    
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

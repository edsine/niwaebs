<div class="preview-block">
    <div class="row gy-4 pl-5">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="department_id">Select Department</label>
                    <select class="form-control" name="department_id" id="department_id" required>
                        <option>Select Department</option>
                         @foreach($departments as $department)
                         <option value="{{ $department->id }}" {{ old('department_id', isset($documents_category) && $documents_category->department_id == $department->id ? 'selected' : '') }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-4 p-5">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="flle_no">File No.</label>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="file_no" name="name" value="{{ old('name', $documents_category->name ?? '') }}" required readonly>
                </div>
            </div>
        </div>
    </div>
        <div class="row gy-4 pl-5">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="description">Subject</label>
                    <input type="text" class="form-control form-control-xl form-control-outlined"
                        id="description" name="description" value="{{old('description', $documents_category->description ?? '')}}" required>
                    
                </div>
            </div>
        </div>
    </div>
   

    <div class="row g-4 p-5">
        <div class="col-2">
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block"><em
                        class="icon ni ni-save me-2"></em> SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#department_id').change(function () {
            var departmentId = $(this).val();
            if (departmentId) {
                $.ajax({
                    url: '/generate-file-no',
                    type: 'POST',
                    data: {
                        department_id: departmentId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                       // alert(JSON.stringify(response));
                        $('#file_no').val(response.data.name);
                    },
                    error: function (response) {
                        alert("Can not generate file no. Contact administrator for help");
                    }
                });
            }
        });
    });
</script>
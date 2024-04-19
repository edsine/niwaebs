<!-- Title Field -->
<div class="form-group col-sm-12 mb-3">
    {!! Form::label('title', 'Document Name:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-12 mb-3">
    {!! Form::label('name', 'Sender Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 mb-3">
    {!! Form::label('email', 'Sender Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
</div>


<!-- Document Url Field -->
<div class="form-group col-sm-6 mb-5">
    {!! Form::label('file', 'Upload A File:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'form-control', 'required', 'id' => 'fileInput', 'accept' => '.pdf,.doc,.docx,image/*']) !!}
        </div>
    </div>
</div>

<div class="form-group col-sm-6" style="display: none">
    {!! Form::label('category_id', 'Select File:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required']) !!}
</div>

<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        const file = this.files[0];
        const maxSize = 1048576; // 1MB in bytes
        const allowedFormats = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/gif'];
        
        if (file) {
            if (!allowedFormats.includes(file.type)) {
                alert('Please select a valid file format (PDF, DOC, DOCX, JPEG, PNG, GIF).');
                this.value = ''; // Clear the file input
            } else if (file.size > maxSize) {
                alert('File size exceeds the maximum limit of 1MB.');
                this.value = ''; // Clear the file input
            }
        }
    });
</script>

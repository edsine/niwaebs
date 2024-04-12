<!-- Service Id Field -->
<div class="col-sm-6">
    {!! Form::label('service_id', 'Service:') !!}
    <p>{{ $serviceApplication->service ? $serviceApplication->service->name : '' }}</p>
</div>

<!-- Application Form Payment Status Field -->
<div class="col-sm-6">
    {!! Form::label('application_form_payment_status', 'Application Form Payment Status:') !!}
    <p>{{ $serviceApplication->application_form_payment_status ? 'Paid' : 'Not Paid' }}</p>
</div>

<!-- Date Of Inspection Field -->
<div class="col-sm-6">
    {!! Form::label('date_of_inspection', 'Date Of Inspection:') !!}
    <p>{{ $serviceApplication->date_of_inspection }}</p>
</div>

<!-- Service Type Id Field -->
<div class="col-sm-6">
    {!! Form::label('service_type_id', 'Service Type:') !!}
    <p>{{ $serviceApplication->service_type_id == 'mechanical' ? 'Mechanical' : 'Manual' }}</p>
</div>


<!-- User Id Field -->
<div class="col-sm-6">
    {!! Form::label('user_id', 'Employer:') !!}
    <p>{{ $serviceApplication->employer() ? $serviceApplication->employer()->company_name : '' }}</p>
</div>


@if ($serviceApplication->current_step == 5)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Documents Approval</h3>
        {!! Form::open([
            'route' => ['application.final.documents.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
        <div class="form-group col-sm-6 mb-5">
            {!! Form::label('mse_document_verification_comment', 'Comments:') !!}
            {!! Form::textarea('mse_document_verification_comment', $serviceApplication->mse_document_verification_comment, [
                'class' => 'form-control',
                'id' => 'mse_document_verification_comment',
            ]) !!}
        </div>
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif

@if ($serviceApplication->current_step == 6)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Processing Fee Payment Approval</h3>
        {!! Form::open([
            'route' => ['application.processingfee.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
        <!-- Date Of Inspection Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('date_of_inspection', 'Date Of Inspection:') !!}
            {!! Form::date('date_of_inspection', null, ['class' => 'form-control', 'id' => 'date_of_inspection']) !!}
        </div>

        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif

@if ($serviceApplication->current_step == 8)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Inspection Fee Payment Approval</h3>
        {!! Form::open([
            'route' => ['application.inspectionfee.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}

        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif

@if ($serviceApplication->current_step == 9)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Inspection Status</h3>
        {!! Form::open([
            'route' => ['application.inspection.status', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
        <div class="form-group col-sm-6 mb-5">
            {!! Form::label('comments_on_inspection', 'Comments:') !!}
            {!! Form::textarea('comments_on_inspection', $serviceApplication->comments_on_inspection, [
                'class' => 'form-control',
                'id' => 'comments_on_inspection',
            ]) !!}
        </div>
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif


@if ($serviceApplication->current_step == 10)
    <div class="col-sm-12">
        <h3>Equipment and Monitoring Fees</h3>
        {!! Form::open([
            'route' => ['application.equipmemt.invoice', $serviceApplication->id],
            'method' => 'post',
            'class' => 'repeater',
            'id' => 'approvalForm',
        ]) !!}
        <input type="hidden" name="payment_type" id="payment_type" value="5">
        <input type="hidden" name="service_application_id" value="{{ $serviceApplication->id }}">
        <div class="row col-sm-12" data-repeater-list="equipment">
            <div class="form-group row col-sm-12" data-repeater-item>
                <div class="row col-sm-12">
                    <div class="form-group col-sm-3">
                        {!! Form::label('equipment', 'Equipment:') !!}
                        {!! Form::select('price', ['' => '', ...$equipment_and_fees], null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('qty', 'Qty/Days/Trip:') !!}
                        {!! Form::number('qty', null, ['class' => 'form-control', 'required']) !!}
                        <div>
                            <p class="price">Price: </p>
                            <input type="hidden" name="sub_price" class=".sub-price">
                        </div>
                    </div>
                    <!-- Delete Button -->
                    <div class="form-group col-sm-3">
                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'data-repeater-delete']) !!}
                    </div>
                </div>
            </div>
        </div>


        <!-- Add Button -->
        <div class="form-group col-sm-3 mt-5">
            {!! Form::button('Add New', ['class' => 'btn btn-success', 'data-repeater-create']) !!}
        </div>
        <div class="form-group col-sm-3 mt-5">
            <span class="total-price"></span>
            <input type="hidden" class="total-price-input" name="total_price">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-xs">Generate Invoice</button>
        </div>
        {!! Form::close() !!}
    </div>
@endif

@if ($serviceApplication->current_step == 12)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Equipment Fee Payment Approval</h3>
        {!! Form::open([
            'route' => ['application.equipmentfee.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}

        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif

@if ($serviceApplication->current_step == 13)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Area Officer Approval</h3>
        {!! Form::open([
            'route' => ['application.areaofficer.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}

        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif

@if ($serviceApplication->current_step == 14)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>HOD Marine Approval</h3>
        {!! Form::open([
            'route' => ['application.hodmarine.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}

        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif

<script type="text/javascript">
    function setSelectedStatus(status) {
        document.getElementById('selected_status_input').value = status;
        let confirmation = confirm("Are you sure you want to proceed?");
        if (confirmation) {
            document.getElementById('approvalForm').submit(); // Submit the form
        }
    }
</script>

{{-- <!-- Mse Are Documents Verified Field -->
<div class="col-sm-12">
    {!! Form::label('mse_are_documents_verified', 'Mse Are Documents Verified:') !!}
    <p>{{ $serviceApplication->mse_are_documents_verified }}</p>
</div>

<!-- Mse Document Verification Comment Field -->
<div class="col-sm-12">
    {!! Form::label('mse_document_verification_comment', 'Mse Document Verification Comment:') !!}
    <p>{{ $serviceApplication->mse_document_verification_comment }}</p>
</div>

<!-- Finance Is Application Fee Verified Field -->
<div class="col-sm-12">
    {!! Form::label('finance_is_application_fee_verified', 'Finance Is Application Fee Verified:') !!}
    <p>{{ $serviceApplication->finance_is_application_fee_verified }}</p>
</div>

<!-- Finance Is Processing Fee Verified Field -->
<div class="col-sm-12">
    {!! Form::label('finance_is_processing_fee_verified', 'Finance Is Processing Fee Verified:') !!}
    <p>{{ $serviceApplication->finance_is_processing_fee_verified }}</p>
</div>

<!-- Finance Is Inspection Fee Verified Field -->
<div class="col-sm-12">
    {!! Form::label('finance_is_inspection_fee_verified', 'Finance Is Inspection Fee Verified:') !!}
    <p>{{ $serviceApplication->finance_is_inspection_fee_verified }}</p>
</div>

<!-- Inspection Status Field -->
<div class="col-sm-12">
    {!! Form::label('inspection_status', 'Inspection Status:') !!}
    <p>{{ $serviceApplication->inspection_status }}</p>
</div>

<!-- Comments On Inspection Field -->
<div class="col-sm-12">
    {!! Form::label('comments_on_inspection', 'Comments On Inspection:') !!}
    <p>{{ $serviceApplication->comments_on_inspection }}</p>
</div>

<!-- Inspection Report Document Path Field -->
<div class="col-sm-12">
    {!! Form::label('inspection_report_document_path', 'Inspection Report Document Path:') !!}
    <p>{{ $serviceApplication->inspection_report_document_path }}</p>
</div>

<!-- Are Equipment And Monitoring Fees Verified Field -->
<div class="col-sm-12">
    {!! Form::label('are_equipment_and_monitoring_fees_verified', 'Are Equipment And Monitoring Fees Verified:') !!}
    <p>{{ $serviceApplication->are_equipment_and_monitoring_fees_verified }}</p>
</div>

<!-- Area Officer Approval Field -->
<div class="col-sm-12">
    {!! Form::label('area_officer_approval', 'Area Officer Approval:') !!}
    <p>{{ $serviceApplication->area_officer_approval }}</p>
</div>

<!-- Area Officer Signature Path Field -->
<div class="col-sm-12">
    {!! Form::label('area_officer_signature_path', 'Area Officer Signature Path:') !!}
    <p>{{ $serviceApplication->area_officer_signature_path }}</p>
</div>

<!-- Hod Marine Approval Field -->
<div class="col-sm-12">
    {!! Form::label('hod_marine_approval', 'Hod Marine Approval:') !!}
    <p>{{ $serviceApplication->hod_marine_approval }}</p>
</div>

<!-- Hod Marine Signature Path Field -->
<div class="col-sm-12">
    {!! Form::label('hod_marine_signature_path', 'Hod Marine Signature Path:') !!}
    <p>{{ $serviceApplication->hod_marine_signature_path }}</p>
</div>

<!-- Permit Document Path Field -->
<div class="col-sm-12">
    {!! Form::label('permit_document_path', 'Permit Document Path:') !!}
    <p>{{ $serviceApplication->permit_document_path }}</p>
</div> --}}


@push('page_scripts')
    <script src="{{ asset('js/jquery.repeater.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            const repeater = $('.repeater').repeater({
                // (Optional)
                // start with an empty list of repeaters. Set your first (and only)
                // "data-repeater-item" with style="display:none;" and pass the
                // following configuration flag
                initEmpty: false,
                // (Optional)
                // "defaultValues" sets the values of added items.  The keys of
                // defaultValues refer to the value of the input's name attribute.
                // If a default value is not specified for an input, then it will
                // have its value cleared.
                defaultValues: {},
                // (Optional)
                // "show" is called just after an item is added.  The item is hidden
                // at this point.  If a show callback is not given the item will
                // have $(this).show() called on it.
                show: function() {
                    $(this).slideDown();
                },
                // (Optional)
                // "hide" is called when a user clicks on a data-repeater-delete
                // element.  The item is still visible.  "hide" is passed a function
                // as its first argument which will properly remove the item.
                // "hide" allows for a confirmation step, to send a delete request
                // to the server, etc.  If a hide callback is not given the item
                // will be deleted.
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                // (Optional)
                // You can use this if you need to manually re-index the list
                // for example if you are using a drag and drop library to reorder
                // list items.
                ready: function(setIndexes) {

                },
                // (Optional)
                // Removes the delete button from the first list item,
                // defaults to false.
                isFirstItemUndeletable: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Listen for changes in the select and number elements
            $('[data-repeater-list="equipment"]').on('change', 'select, input[type="number"]', function() {
                updatePrice($(this).closest('[data-repeater-list="equipment"]'));
            });

            // Function to update the price for a specific repeater list
            function updatePrice(repeaterList) {
                var totalPrice = 0;

                // Iterate through each repeater item
                repeaterList.find('[data-repeater-item]').each(function() {
                    var repeaterItem = $(this);
                    var selectedValue = repeaterItem.find('select').val();
                    var quantity = repeaterItem.find('input[type="number"]').val();
                    var price = selectedValue * quantity;

                    // Update the corresponding p tag with the calculated price
                    repeaterItem.find('.price').text('Price: ' + price);
                    repeaterItem.find('.sub-price').val(price);

                    // Add the price to the total
                    totalPrice += price;
                });

                // Update the total price for the repeater list
                $('.total-price').text('Total Price: ' + totalPrice);
                $('.total-price-input').val(totalPrice);
            }
        });
    </script>
@endpush

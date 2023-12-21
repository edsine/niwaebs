<!-- Name Field -->


<!-- Destination Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::text('destination', null, ['class' => 'form-control','readonly' => true]) !!}
</div>

<!-- NUMBER OF DAYS -->
<div class="form-group col-sm-6">
    {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
    {!! Form::number('number_days',null, ['class' => 'form-control','readonly' => true]) !!}
</div>
{{-- Travel date --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('travel_date', 'TRAVEL DATE:') !!}
    {!! Form::date('travel_date',null, ['class' => 'form-control','readonly' => true]) !!}
</div>
{{-- Arrival date --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('arrival_date', 'ARRIVAL DATE:') !!}
    {!! Form::date('arrival_date',null, ['class' => 'form-control','readonly' => true]) !!}
</div>
{{--  estimated expenses --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('estimated_expenses', 'ESTIMATED EXPENSES:') !!}
    {!! Form::text('estimated_expenses',null, ['class' => 'form-control','readonly' => true]) !!}
</div>
{{-- purpose of travel --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('purpose_travel ', 'PURPOSE OF TRAVEL:') !!}
    {!! Form::textarea('purpose_travel',null, ['class' => 'form-control','readonly' => true]) !!}
</div>

{{-- <div class="form-group col-sm-6 my-4">
    {!! Form::label('branch_id', 'Branch') !!}
    {!! Form::select('branch_id',$branches,null, ['class' => 'form-control form-control-solid border border-2']) !!}
</div> --}}
<!-- document fields -->
<div class="col-sm-4 my-5">
    <span class="text-danger">UPLOAD ALL NECESSARY SUPPORTING DOCUMENT INCLUDING RECIEPT AND INVOICE(SCAN ALL AS SINGLE DOC IN PDF FORMAT)</span>
    <div class="form-group">
        {!! Form::file('uploaded_doc',null, ['class' =>'form-control','accept' => 'application/pdf','readonly' => true]) !!}
    </div>
    {!! Form::label('uploaded_doc', ' PDF FILE') !!}
</div>

<div class="form-group col-sm-6 my-4">
    {!! Form::label('comments ', 'Comments:') !!}
    {!! Form::textarea('comments',null, ['class' => 'form-control']) !!}
</div>


@if(isset($unit_head_data))
<!-- HOD Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supervisor_status', 'Account Officer Status') !!}
    <div class="">
    {!! Form::radio('supervisor_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('supervisor_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endif

@if(isset($department_head_data))
<!-- HOD Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hod_status', 'HOD Status') !!}
    <div class="">
    {!! Form::radio('hod_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('hod_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endif

@role('MD')
<?php 
if($dtarequests->hod_status == 1){
?>
<!-- MD Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('md_status', 'MD Status') !!}
    <div class="">
    {!! Form::radio('md_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('md_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
<?php } ?>
@endrole
@role('ED FINANCE & ACCOUNT')
<?php 
if($dtarequests->hod_status == 1 && $dtarequests->md_status == 1){
?>
<!-- Account Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_status', 'Account Status') !!}
    <div class="">
    {!! Form::radio('account_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('account_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
<?php } ?>
@endrole
@role('ED FINANCE & ACCOUNT')
<!-- Approval Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approval_status', 'Confirm Approval') !!}
    <div class="">
    {!! Form::radio('approval_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('approval_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endrole
<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service:') !!}
    {!! Form::select('service_id', $services, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Sub Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_service_id', 'Sub-Service:') !!}
    {!! Form::select('sub_service_id', $sub_services, null, ['class' => 'form-control custom-select']) !!}
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

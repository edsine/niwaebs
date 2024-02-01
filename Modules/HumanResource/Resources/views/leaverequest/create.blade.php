@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">REGISTRATION PORTAL</h4>
                        <form id="example-vertical-wizard" method="POST" action="{{ route('leave_request.index') }}">
                            @csrf

                            <div>
                                <h3>Step 1</h3>
                                <section>
                                    <h4 class="card-title">LEAVE DETAILS</h4>
                                    <div class="form-group ">
                                        {!! Form::label('type', 'SELECT LEAVE TYPE.:') !!}
                                        <select name="type"
                                            class="form-control form-control-solid border border-2 form-select" required
                                            id="leave_type">
                                            @foreach ($leavetype as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group ">
                                        {!! Form::label('date_start_new', 'DATE REQUESTED TO COMMENCE PRESENT LEAVE:') !!}
                                        {!! Form::date('date_start_new', null, [
                                            'class' => 'form-control form-control-solid border border-2 ',
                                            'id' => 'date_start',
                                        ]) !!}
                                    </div>


                                    <div class="form-group ">
                                        {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
                                        {!! Form::number('number_days', null, [
                                            'class' => 'form-control form-control-solid border border-2 ',
                                            'readonly' => true,
                                            'id' => 'number_days',
                                        ]) !!}
                                    </div>

                                    <div class="form-group ">
                                        {!! Form::label('daystaken', 'Number of days to take:') !!}
                                        {!! Form::number('daystaken', null, [
                                            'class' => 'form-control form-control-solid border border-2 ',
                                            'placeholder' => 'input the number of days to take',
                                            'id' => 'days',
                                        ]) !!}
                                    </div>
                                    <div class="form-group ">
                                        {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:') !!}
                                        {!! Form::text('end_date', null, [
                                            'class' => 'form-control form-control-solid border border-2 ',
                                            'placeholder' => 'the date for you to resume',
                                            'id' => 'end_date',
                                            'readonly' => true,
                                        ]) !!}
                                    </div>
                                    <div class="form-group my-5 ">
                                        {!! Form::button('Update', ['class' => 'btn btn-info', 'id' => 'u']) !!}
                                    </div>

                                </section>
                                <h3>Step 2</h3>
                                <section>
                                    <h4 class="card-title">PERSONAL INFORMATION</h4>

                                    <div class="form-group ">
                                        {!! Form::label('home_address', 'LEAVE DESTINATION ADDRESS:') !!}
                                        {!! Form::text('home_address', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                                    </div>
                                    <div class="form-group ">
                                        {!! Form::label('local_council', 'LOCAL COUNCIL/AREA COUNCIL:') !!}
                                        {!! Form::text('local_council', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                                    </div>
                                </section>
                                <h3>Step 3</h3>
                                <section>
                                    <h4 class="card-title">Additional fields</h4>
                                    <div class="form-group ">
                                        {!! Form::label('state', 'STATE:') !!}
                                        {!! Form::select('state', getBranchRegions(), null, [
                                            'class' => 'form-control form-control-solid border border-2 form-select ',
                                        ]) !!}
                                    </div>

                                    <div class="form-group ">
                                        {!! Form::label('phone_number', 'PHONE NUMBER:') !!}
                                        {!! Form::text('phone_number', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                                    </div>
                                    <div class="form-group ">
                                        {!! Form::label('officer_relieve', 'NAME OF OFFICER TO RELIEVE:') !!}
                                        {!! Form::text('officer_relieve', null, ['class' => 'form-control form-control-solid border border-2 ']) !!}
                                    </div>
                                </section>
                                

                                <h3>Finish</h3>
                                <section>
                                    <h4 class="card-title">YOU ARE ABOUT APPLYING FOR A LEAVE</h4>
                                    <!-- Signature Field -->
                                    <div class="col-sm-4 my-4">
                                        {!! Form::label('signature_path', 'UPLOAD SIGNATURE PDF ONLY') !!}
                                        <div class="form-group">
                                            {!! Form::file('signature_path', null, [
                                                'class' => 'form-control form-control-solid border border-2',
                                                'accept' => 'image/*',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{-- <input class="checkbox" type="checkbox"> --}}
                                            UPLOAD SIGNATURE AND CONFIRM BY PRESSING THE APPLY BUTTON
                                        </label>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

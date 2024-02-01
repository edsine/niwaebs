@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">REGISTRATION PORTAL</h4>
                        <form id="example-vertical-wizard" method="POST" action="{{ route('users.store') }}">

                            @csrf

                            <div>
                                <h3>PERSONAL INFORMATION</h3>
                                <section>
                                    <h4 class="card-title">POSITION ATTAINED</h4>
                                    <div class="form-group">
                                        {!! Form::label('ranking_id', 'Rank') !!}
                                        {!! Form::select('ranking_id', $rank, null, [
                                            'class' => 'form-control form-control-solid border border-2 form-select',
                                        ]) !!}
                                    </div>
                                    <div class="form-group">

                                        {!! Form::label('roles', 'Roles') !!}
                                        {!! Form::select('roles[]', $roles, null, [
                                            'class' => 'form-control form-control-solid border border-2 form-select',
                                        ]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::email('email', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>

                                </section>
                                <h3>PERSONAL INFORMATION</h3>
                                <section>
                                    <h4 class="card-title">PERSONAL INFORMATION</h4>

                                    <div class="form-group">
                                        {!! Form::label('first_name', 'First Name') !!}
                                        {!! Form::text('first_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('middle_name', 'Middle Name') !!}
                                        {!! Form::text('middle_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('last_name', 'Last Name') !!}
                                        {!! Form::text('last_name', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                </section>
                                <h3>PASSKEY AREA </h3>
                                <section>
                                    <h4 class="card-title">CREDENTIALS AREA </h4>
                                    <div class="form-group">
                                        {!! Form::label(
                                            'password',
                                            'Password (Password must be a minimum of 12 characters including atleast a number and symbol)',
                                        ) !!}
                                        {!! Form::password('password', [
                                            'id' => 'password',
                                            'class' => 'form-control form-control-solid border border-2',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                        <div id="password-strength" class="form-text"
                                            style="color:brown;font-weight: bolder"></div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                                        {!! Form::password('password_confirmation', [
                                            'id' => 'passwordConfirmation',
                                            'class' => 'form-control form-control-solid border border-2',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                        <div id="password-match" class="form-text"></div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('department_id', 'Department') !!}
                                        {!! Form::select('department_id', $department, null, [
                                            'class' => 'form-control form-control-solid border border-2',
                                        ]) !!}
                                    </div>

                                </section>
                                <h3>OTHER INFORMATION</h3>
                                <section>
                                    <h4 class="card-title">OTHER INFORMATION</h4>

                                    <div class="form-group">
                                        {!! Form::label('staff_id', 'Staff ID') !!}
                                        {!! Form::text('staff_id', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Phone Number') !!}
                                        {!! Form::number('phone', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('about_me', 'About Me') !!}
                                        {!! Form::textarea('about_me', null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>

                                </section>

                                <h3>Finish</h3>
                                <section>

                                    <h4 class="card-title">Finish</h4>
                                    <div class="form-group">
                                        {!! Form::label('branch_id', 'Area Office') !!}
                                        {!! Form::select('branch_id', $branch, null, ['class' => 'form-control form-control-solid border border-2']) !!}
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            I agree with the Terms and Conditions.
                                        </label>
                                    </div>
                                </section>
                            </div>
                            {{-- {!!Form::submit('Submit',['class'=>'btn btn-blue'])!!}
                        <a href="{{route('users.index')}}" class="btn btn-default"> Abort</a> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

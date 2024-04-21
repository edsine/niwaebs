@extends('layouts.app')
@section('content')
@include('flash::message')
    <form class=" form" action="{{ route('uploadpay') }}" enctype="multipart/form-data" method="post">

        @csrf

        <div class="form-group col-4">

            <labe class=" label form-label" for="">UPLOAD THE EXCEL FORM HERE</labe>
            <input type="file" class=" form-control file" name="file" id="">
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
@endsection

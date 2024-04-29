@extends('layouts.app')

@section('content')
    @include('flash::message')




    <form class="form" action="{{ route('uploadpay') }}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">

            <div class="form-group col-6">

                <label for="" class=" form-label text-uppercase">Upload Record <i
                        class=" text-danger">*</i></label>
                <input type="file" name="file" class=" form-control file col-8" id="">
            </div>

            <div class="form-group col-6 mt-2">
                <a href="{{ route('paydownload') }}" class="btn  btn-secondary  btn-sm "> <i class=" bi bi-download"></i>
                    DOWNLOAD SAMPLE</a>

            </div>
            <div class="form-group">

                <button class=" btn btn-success" type="submit">Submit</button>
            </div>


    </form>
@endsection

@extends('layouts.app')

@section('content')
    @include('flash::message')




    <form class="form" action="{{ route('servicestore') }}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">

            <div class="form-group col-6">

                <label for="" class=" form-label text-uppercase">Upload Service Application Record <i
                        class=" text-danger">*</i></label>
                <input type="file" name="file" class=" form-control file col-8" id="">
            </div>

            <div class="form-group col-6 mt-2">
                <a href="{{ route('savapdownload') }}" class="btn  btn-secondary  btn-sm "> <i class=" bi bi-download"></i>
                    DOWNLOAD A SAMPLE</a>

            </div>
            <div class="form-group">

                <button class=" btn btn-success" type="submit">Submit</button>
            </div>


    </form>
@endsection

@extends('layouts.app')

@section('content')
    @include('flash::message')


    <form action="{{ route('emplistsa') }}" enctype="multipart/form-data" method="post" class="form">
        @csrf

        <div class="row">

            <div class="form-group col-6">
                <label for="" class=" form-label">Upload Clients Record <i class=" text-danger">*</i></label>
                <input type="file" name="file" class=" form-control file" id="">
            </div>
            <div class="form-group col-6 mt-2">

                <a href="{{route('empldownload')}}" class="btn  btn-secondary  btn-sm"><i class=" bi bi-download"></i>DOWNLOAD SAMPLE</a>
            </div>

            <div class="form-group ">

                <button class=" btn btn-success" type="submit">Submit</button>
            </div>


        </div>
    </form>


@endsection

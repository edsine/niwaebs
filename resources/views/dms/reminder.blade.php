@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="float-left">Reminder</div>
            <a href="{{ route('reminder.create') }}" class="btn btn-sm btn-success"> <i class="bi bi-plus"></i> Add
            Reminder</a>
        </div>

        <div class="card">

            <div class="card-body">



                <table id="table" class="table table-responsive datatable">
                    <thead>
                        <tr>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Frequency</th>
                            <th scope="col">Document</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <th></th>
                            <td></td>
                            <td>
                                <input type="text" name="seachsubject" id="seachsubject" class="form-control "
                                    placeholder="Subject">
                            </td>
                            <td> <input type="text" name="searchmessage" id="searchmessage" class="form-control "
                                    placeholder="Message"></td>
                            <td>{!! Form::select('searchfrequency', ['number' => 'frequency'], null, [
                                'class' => ' form-select form-control  select',
                                'id' => 'searchfrequency',
                            ]) !!}</td>
                            <td></td>
                        </tr> --}}

                        @foreach ($data as $item)
                            <tr>
                                <th>{{ $item->reminderstart_date }}</th>
                                <td>{{ $item->reminderend_date ? $item->reminderend_date : $item->reminderstart_date }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->frequency ? $item->frequency : '' }}</td>
                                <td>{{ '' }}</td>
                                <td>

                                    <i class=" bi bi-three-dots-vertical"></i>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        var searchmessage = $('#searchmessage');
        var searchfrequency = $('#searchfrequency');
        var seachsubject = $('#seachsubject');
        seachsubject.hide()
        // $(function() {
        //     seachsubject.click(function(
        //         alert('ddddddddddddddddddddd');
        //     ))
        // })
    </script>
@endsection

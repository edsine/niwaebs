@extends('layouts.app')
@section('content')
    <a class="btn btn-success float-end" href="{{ route('emplist') }}">Mass Upload</a>
    <table class="table data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Oranisation Name</th>
                <th>Company Email</th>
                <th>Company Address</th>
                <th>Contact Person</th>
                <th>Contact Phone Number</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->company_name }}</td>
                    <td>{{ $data->company_email }}</td>
                    <td>{{ $data->company_address }}</td>
                    <td>{{ $data->contact_firstname . '' . $data->contact_middlename . '' . $data->contact_surname }}</td>
                    <td>{{ $data->contact_number }}</td>
                </tr>
            @endforeach
        </tbody>
        <script>
           let table = new DataTable('.table');
        </script>
    </table>
@endsection
@extends('layouts.app')
@section('content')
    <div class=" my-3">

        <a href="{{ route('payhistoryform') }}" class="btn btn-sm btn-success">UPLOAD RECORD</a>
    </div>

    <table class="table data-table" id="atpdata-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>APPLICANT CODE </th>
                <th>PAYMENT TYPE</th>
                <th>AREA OFFICE </th>

                <th>SERVICES </th>
                <th>PAYMENT STATUS</th>
                <th>AMOUNT </th>
                <th>TRANSACTION ID</th>
                <th> DATE</th>
                <th>ACTION</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($payment as $item)
                {{-- @dd($item->serviceapp()->theservice); --}}
                <tr>


                    <td>{{ $item->id }}</td>
                    <td>{{ $item->serviceapp() ? $item->serviceapp()->applicant_code : 'NO CODE FOUND' }}</td>

                    <td>{{ $item->type ? $item->type->name : 'Payment Type not found' }}</td>
                    <td>{{ $item->branch ? $item->branch->branch_name : 'No Area Office' }}</td>

                    {{-- @dd($item->serviceapp()->theservice->name); --}}
                    <td>{{ $item->serviceapp() ? $item->serviceapp()->theservice->name : 'No Yet Applied' }}
                    </td>

                    @if ($item->payment_status == 1)
                        <td>
                            <span class="text-success">Payment Successful</span>


                        </td>
                    @endif
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->transaction_id }}</td>

                    <td> {{date('l,F,j,Y',strtotime($item->paid_at ))}}</td>
                    <td>
                        <a href="{{ route('payhistoryedit', [$item->id]) }}">Modify Record</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <script>
            let table = new DataTable('.table');
        </script>
    </table>
@endsection

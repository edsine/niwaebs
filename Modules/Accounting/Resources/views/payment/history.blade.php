@extends('layouts.app')
@section('content')
    <div class=" container-fluid">
        <a href="{{ route('payhistoryform') }}" class="float-end btn btn-sm btn-success">UPLOAD RECORD</a>
    </div>
    <table class=" table data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>APPLICANT </th>
                <th>AREA OFFICE </th>

                <th>SERVICES  </th>
                <th>PAYMENT STATUS</th>
                <th>AMOUNT </th>
                <th>TRANSACTION ID</th>
                <th> PAID AT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($payment as $item)
                <tr>

                    <td>{{$item->id}}</td>
                    <td>{{ $item->employer ? $item->employer->company_name : 'No NAME FOUND' }}</td>
                    <td>{{ $item->branch ? $item->branch->branch_name : 'No Area Office' }}</td>
                    {{-- @dd($item->serviceapplication->service->name); --}}
                    <td>{{ $item->serviceapplication? $item->serviceapplication->service->name : 'No Yet Applied' }}
                    </td>

                    @if ($item->payment_status == 1)
                        <td>
                            <span class="text-success">Payment Successful</span>


                        </td>
                    @endif
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->transaction_id }}</td>
                    <td>{{ $item->paid_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

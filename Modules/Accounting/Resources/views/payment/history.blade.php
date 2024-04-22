@extends('layouts.app')
@section('content')

<div class=" container-fluid">
    <a href="{{route('payhistoryform')}}" class="float-end btn btn-sm btn-success">UPLOAD RECORD</a>
</div>
<table class=" table data-table">
    <thead>
        <tr>
            <th>CLIENT </th>
            <th>AREA OFFICE </th>
            {{-- <th>SERVICE </th> --}}
            <th>SERVICE APPLICATION </th>
            <th>AMOUNT </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payment as $item)
        <tr>
                
            <td>{{$item->employer?$item->employer->company_name:'No NAME FOUND' }}</td>
            <td>{{$item->branch?$item->branch->branch_name:'No Area Office'}}</td>
            {{-- <td>{{$item->service->name}}</td> --}}
            <td>{{$item->serviceapplication->service?$item->serviceapplication->service->name: 'No Yet Applied'}}</td>
            <td>{{$item->amount}}</td>
        </tr>
            @endforeach
    </tbody>
</table>
    
@endsection
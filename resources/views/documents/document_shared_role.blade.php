@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assigned Role Documents</h1>
                </div>
                
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-5">
                <div class="table-responsive1">
                    <table class="table" id="document-table">
                        <thead>
                            <tr>
                                {{-- <th>S/N</th> --}}
                                <th>Document Name</th>
                                <th>Role Name</th>
                                <th>Document URL</th>
                                <th>Document Category</th>
                                <th>Start Date</th>
                                <th>Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $n =1; @endphp
                            @foreach ($documents as $document)
                                
                                <tr>
                                    {{-- <td>{{ $n++ }}</td> --}}
                                    <td>{{ $document->title }}</td>
                                    {{-- <td>{{ $document->description }}</td> --}}
                                    <td>{{ $document->role_name ?? 'NILL' }}</td>
                                    <td><a target="_blank" href="{{ asset($document->document_url) }}">{{ substr($document->document_url, 10) }} </a>
                                    <td>{{ $document->category_name ?? 'NILL' }}</td>
                                    <td>{{ $document->start_date }}</td>
                                    <td>{{ $document->end_date }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $documents])
                    </div>
                </div>
            </div>
            
            
           
            
        </div>
    </div>

@endsection

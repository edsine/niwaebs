@extends('layouts.app')

@section('title', 'Services')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Document Upload Names</h3>
                <div class="nk-block-des text-soft">
                    
                </div>
            </div><!-- .nk-block-head-content -->
            
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
<div class="row">
    <div class="col-md-12 text-right" style="padding-right: 30px;">
        <a href="{{ route('document_upload.create') }}" class="btn btn-primary"><em class="fa fa-plus"></em><span>Add New Document</span></a>
    </div>
</div>
    <div class="card-body p-5">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="order-listing">
            <thead>
                <tr>
                            <th>Service Name</th>
                            <th>Area Office</th>
                            <th>Document Name</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody> @php
                        $no = 1;
                    @endphp
                        @foreach ($document_uploads as $document_upload)
                        <tr class="fw-bold text-muted bg-light">
                                
                            <td>{{ ucwords(strtolower($document_upload->service->name ?? 'NILL')) }}</td>
                            <td>{{ $document_upload->branch->branch_name ?? 'NILL' }}</td>
                                <td>{{ $document_upload->name }}</td>
                                <td>
                                    <a style="padding-right:10px;" href="{{ route('document_upload.edit', $document_upload->id) }}" title="Edit Service"><span
                                            class="nk-menu-icon text-info"><em class="fa fa-edit"></em></span></a>
                                    

                                    <a id="delete-service" title="Terminate Service" style="cursor: pointer;"
                                        onclick="event.preventDefault();
                                    document.getElementById('delete-service-form').submit();"><span
                                            class="nk-menu-icon text-danger eg-swal-av3"><em
                                                class="fa fa-trash"></em></span>
                                    </a>
                                    <form id="delete-service-form" action="{{ route('document_upload.destroy', $document_upload->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button onclick="return false" id="delete-service"
                                            class="btn btn-danger">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <div class="float-right">
                    @include('adminlte-templates::common.paginate', ['records' => $document_uploads])
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#delete-service').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure ?',
                    text: "You won't be able to revert this !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //redirect to database
                    if (result.isConfirmed) {
                        $('#delete-service-form').submit();
                    }
                    //handle through ajax
                    /* if (result.value) {
                        Swal.fire('Deleted!', 'Your selected item has been deleted.', 'success');
                    } */
                })
            });
        });
    </script>
   
@endpush

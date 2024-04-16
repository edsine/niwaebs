@extends('layouts.app')

@section('title', 'Document Categories')


@push('styles')
@endpush


@section('content')
{{-- @include('layouts.messages') --}}
    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">File Indexing</h3>
                <div class="row">
                <div class="col-md-12">
                    @can("create folder")
                    
                    <a href="{{ route('documents_category.create') }}" class="btn btn-primary float-end" ><em
                        class="fa fa-user-add"></em> <span>Add New File</span></a>
                    @endcan
                </div>
                </div>
            </div><!-- .nk-block-head-content -->
           <!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="card-body p-5">
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-4" id="order-listing">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>File No.</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($documents_categories as $index => $documents_category)
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Use $index + 1 as the serial number -->
                            <td>{{ $documents_category->department ? $documents_category->department->name.' / ' : '' }}{{ $documents_category->name }}</td>
                            <td>
                                <a style="padding-right:10px;" href="{{ route('documents_category.edit', $documents_category->id) }}" title="Edit Document Category">
                                    <span class="nk-menu-icon text-info"><em class="fa fa-edit"></em></span>
                                </a>
                                <a id="delete-documents-category" title="Terminate documents category" style="cursor: pointer;"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-documents-category-form').submit();">
                                    <span class="nk-menu-icon text-danger eg-swal-av3"><em class="icon ni ni-user-remove"></em></span>
                                </a>
                                <form id="delete-documents-category-form" action="{{ route('documents_category.destroy', $documents_category->id) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button onclick="return false" id="delete-service" class="btn btn-danger">Delete</button> --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <script>
                (function($) {
                    'use strict';
                    $(function() {
                        $('#order-listing').DataTable({
                            "aLengthMenu": [
                                [5, 10, 15, -1],
                                [5, 10, 15, "All"]
                            ],
                            "iDisplayLength": 10,
                            "language": {
                                search: ""
                            },
                            "columnDefs": [ // Add this to specify column rendering
                                { "orderable": false, "targets": 0 } // Disable sorting for the first column
                            ]
                        });
                        $('#order-listing').each(function() {
                            var datatable = $(this);
                            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                            search_input.attr('placeholder', 'Search');
                            search_input.removeClass('form-control-sm');
                            // LENGTH - Inline-Form control
                            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                            length_sel.removeClass('form-control-sm');
                        });
                    });
                })(jQuery);
            </script>
                        </div>
        </div><!-- .card-preview -->
    
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#delete-documents-category').on('click', function(e) {
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
                        $('#delete-documents-category-form').submit();
                    }
                    //handle through ajax
                    /* if (result.value) {
                        Swal.fire('Deleted!', 'Your selected item has been deleted.', 'success');
                    } */
                })
            });
        });
    </script>
    <!-- JavaScript -->
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>
@endpush

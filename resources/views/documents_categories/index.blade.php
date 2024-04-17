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
            <table class="table align-middle gs-0 gy-4" id="order-listing1">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>File No.</th>
                        <th>Subject</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($documents_categories as $index => $documents_category)
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Use $index + 1 as the serial number -->
                            <td>{{ $documents_category->department ? $documents_category->department->name.' / ' : '' }}{{ $documents_category->name }}</td>
                            <td>{{ $documents_category->description }}</td>
                            <td>
                                <a style="padding-right:10px;" href="{{ route('documents_category.edit', $documents_category->id) }}" title="Edit Document Category">
                                    <span class="nk-menu-icon text-info"><em class="fa fa-edit"></em></span>
                                </a>
                               

                              {{--   <a href="#" title="Terminate document category" style="cursor: pointer;"
                                            onclick="confirmDelete('{{ route('documents_category.destroy', $documents_category->id) }}')">
                                            <span class="nk-menu-icon text-danger eg-swal-av3">
                                                <em class="fa fa-trash"></em>
                                            </span>
                                        </a> --}}
                                        <form id="delete-documents-category-form-{{ $documents_category->id }}" action="{{ route('documents_category.destroy', $documents_category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="deleted" value="{{ $documents_category->id }}"/>
                                            @method('DELETE')
                                        </form>
                                        
                                        <a href="#" onclick="confirmDelete('{{ route('documents_category.destroy', $documents_category->id) }}')">Delete</a>
                                        
                                        <script>
                                            function confirmDelete(deleteUrl) {
                                                // Show confirmation dialog
                                                if (confirm('Are you sure you want to delete this item?')) {
                                                    // Redirect to the delete URL
                                                    window.location.href = deleteUrl;
                                                }
                                            }
                                        </script>
                                        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            
                        </div>
        </div><!-- .card-preview -->
         <script>
            (function($) {
                'use strict';
                $(function() {
                    $('#order-listing1').DataTable({
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
                    $('#order-listing1').each(function() {
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
@endsection



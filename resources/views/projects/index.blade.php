@extends('layouts.app')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>{{ session()->get('message') }}
        </div>
    @endif
    @if (session()->has('message1'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message1') }}</div>
    @endif
    @if ($errors->has('title'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><strong>{{ $errors->first('title') }}</strong></div>
    @endif

    <!--Document List Start-->
    <div class="container-fluid ">
        <div class="col-md-12 panel">
            {{-- <h1>{{ trans('Digital Asset Register') }}(<?php echo $ldms_total_documents_number; ?>)</h1> --}}
            <h1>{{ trans('Manage Projects') }}</h1>


        </div>
        <div class="container">

            <div class="float-end">
                <a href="#" data-toggle="modal" data-target="#client" class="btn btn-primary"><i
                        class="fa fa-plus"></i>

                </a>
            </div>



        </div>
        <!--Document List End-->
        <div class="row">
            <div class="col-xxl-12">
                <div class="row">
                    @foreach ($project as $client)
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-header border-0 pb-0">

                                    <div class="card-header-right">
                                        <div class="btn-group card-option">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                {{-- <i class="ti ti-dots-vertical"></i> --}}
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                {{--                                            <a href="{{ route('clients.show',$client->id) }}"  class="dropdown-item" data-bs-original-title="{{__('View')}}"> --}}
                                                {{--                                                <i class="ti ti-eye"></i> --}}
                                                {{--                                                <span>{{__('Show')}}</span> --}}
                                                {{--                                            </a> --}}

                                                @can('edit client')
                                                    <a href="#!" data-size="md"
                                                        data-url="{{ route('clients.edit', $client->id) }}"
                                                        data-ajax-popup="true" class="dropdown-item"
                                                        data-bs-original-title="{{ __('Edit User') }}">
                                                        <i class="ti ti-pencil"></i>
                                                        <span>{{ __('Edit') }}</span>
                                                    </a>
                                                @endcan

                                                @can('delete client')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['clients.destroy', $client['id']],
                                                        'id' => 'delete-form-' . $client['id'],
                                                    ]) !!}
                                                    <a href="#!" class="dropdown-item bs-pass-para">
                                                        <i class="ti ti-archive"></i>
                                                        <span>
                                                            @if ($client->delete_status != 0)
                                                                {{ __('Delete') }}
                                                            @else
                                                                {{ __('Restore') }}
                                                            @endif
                                                        </span>
                                                    </a>

                                                    {!! Form::close() !!}
                                                @endcan

                                                <a href="#!"
                                                    data-url="{{ route('clients.reset', \Crypt::encrypt($client->id)) }}"
                                                    data-ajax-popup="true" class="dropdown-item"
                                                    data-bs-original-title="{{ __('Reset Password') }}">
                                                    <i class="ti ti-adjustments"></i>
                                                    <span> {{ __('Reset Password') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body full-card">
                                    <div class="img-fluid rounded-circle card-avatar">
                                        <img src="{{ !empty($client->avatar) ? asset(Storage::url('uploads/avatar/' . $client->avatar)) : asset(Storage::url('uploads/avatar/avatar.png')) }}"
                                            alt="kal" class="img-user wid-80 rounded-circle">
                                    </div>
                                    <h4 class=" mt-2">{{ $client->name }}</h4>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="d-grid">
                                                {{ $client->email }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center h6 mt-2" data-bs-toggle="tooltip"
                                        title="{{ __('Last Login') }}">
                                        {{ !empty($client->last_login_at) ? $client->last_login_at : '' }}
                                    </div>
                                </div>
                                <div class="card-footer p-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="mb-0">
                                                @if ($client->clientDeals)
                                                    {{ $client->clientDeals->count() }}
                                                @endif
                                            </h6>
                                            <p class="text-muted text-sm mb-0">{{ __('Deals') }}</p>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="mb-0">
                                                @if ($client->clientProjects)
                                                    {{ $client->clientProjects->count() }}
                                                @endif
                                            </h6>
                                            <p class="text-muted text-sm mb-0">{{ __('Projects') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div id="client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                {{-- {!! Form::open(['route' => 'documents.store', 'method' => 'post', 'files' => true]) !!} --}}

                <div class="modal-header">
                    <span style="font-weight: 850;"> NEW PROJECT</span>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    @csrf
                    <form method="post" action="{{ route('projects.store') }}" files="true"
                        enctype="multipart/form-data">
                        <div class="col-md-12">
                            {!! csrf_field() !!}
                            <div class="row-12">

                                <div class="form-group">
                                    <label for="ldms_documentTitle">{{ trans('Project Name') }}</label>
                                    <div class="form-group-inner">
                                        <div class="field-outer">
                                            <input class="form-control" type="text" name="project_name"
                                                id="ldms_documentTitle" placeholder="{{ trans('Enter Project Name') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-12">

                                <div class="form-group">
                                    <label for="ldms_documentTitle">{{ trans('Project Image') }}</label>
                                    <div class="form-group-inner">
                                        <div class="field-outer">
                                            <input class="form-control" type="file" name="project_image"
                                                id="ldms_documentTitle">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ldms_documentTitle">{{ trans('Start Date') }}</label>
                                        <div class="form-group-inner">
                                            <div class="field-outer">
                                                <input class="form-control" type="date" name="start_date"
                                                    id="ldms_documentTitle">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ldms_documentTitle">{{ trans('End Date') }}</label>
                                        <div class="form-group-inner">
                                            <div class="field-outer">
                                                <input class="form-control" type="date" name="end_date"
                                                    id="ldms_documentTitle">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ldms_documentTitle">{{ trans('Client') }}</label>
                                        <div class="form-group-inner">
                                            <div class="field-outer">
                                                {{-- <input class="form-control" type="date" name="start_date"
                                                    id="ldms_documentTitle"> --}}
                                                    {!! Form::select('client', $clients, null, ['class'=>'form-control form-select']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ldms_documentTitle">{{ trans('User') }}</label>
                                        <div class="form-group-inner">
                                            <div class="field-outer">
                                                {{-- <input class="form-control" type="date" name="start_date"
                                                    id="ldms_documentTitle"> --}}
                                                    {!! Form::select('user[]', $users, null, ['class'=>'form-control form-select']) !!}
                                                {{-- <select name="user_id">
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ldms_documentTitle">{{ trans('Budget') }}</label>
                                        <div class="form-group-inner">
                                            <div class="field-outer">
                                                <input class="form-control" type="number" name="budget"
                                                    id="ldms_documentTitle">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ldms_documentTitle">{{ trans('Estimated Hours') }}</label>
                                        <div class="form-group-inner">
                                            <div class="field-outer">
                                                <input class="form-control" type="number" name="estimated_hrs"
                                                    id="ldms_documentTitle">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group">
                                    <label for="ldms_documentTitle">{{ trans('Description') }}</label>
                                    <div class="form-group-inner">
                                        <div class="field-outer">
                                            {{-- <input class="form-control" type="text" name="description"
                                                id="ldms_documentvendor" placeholder="{{ trans('enter some desc') }}"> --}}

                                                {!! Form::textarea('description',  null, ['class'=>'form-control form-textarea']) !!}
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                    <div class="form-group">
                                        <label for="ldms_documentTitle">{{ trans('Status') }}</label>
                                        <div class="form-group-inner">
                                            <div class="field-outer">
                                                {!! Form::select('status', $status, null, ['class'=>'form-control form-select']) !!}

                                            </div>
                                        </div>
                                    </div>

                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="ldms_documentTitle">{{ trans('Tags') }}</label>
                                    <div class="form-group-inner">
                                        <div class="field-outer">
                                            <input class="form-control" type="text" name="tag"
                                                id="ldms_documentTitle">

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="form-group submit text-right">
                            <label for="submit"></label>
                            <div class="form-group-inner">
                                <div class="field-outer">
                                    <input type="submit" name="submit" value="{{ trans('Submit') }}"
                                        class="btn btn-primary" id="createForm">
                                </div>
                            </div>
                        </div>


                    </form>

                    <script type="text/javascript">
                        var table = $('#document-table').DataTable({
                            "order": [],
                            'language': {
                                'lengthMenu': '_MENU_ {{ trans('file.records per page') }}',
                                "info": '{{ trans('file.Showing') }} _START_ - _END_ (_TOTAL_)',
                                "search": '{{ trans('file.Search') }}',
                                'paginate': {
                                    'previous': '{{ trans('file.Previous') }}',
                                    'next': '{{ trans('file.Next') }}'
                                }
                            },
                            'columnDefs': [{
                                    "orderable": false,
                                    'targets': [0, 6]
                                },
                                {
                                    'checkboxes': {
                                        'selectRow': true
                                    },
                                    'targets': 0
                                }
                            ],
                            'select': {
                                style: 'multi',
                                selector: 'td:first-child'
                            },
                            'lengthMenu': [
                                [10, 25, 50, -1],
                                [10, 25, 50, "All"]
                            ],
                            dom: 'Blfrtip',
                            buttons: [{
                                    extend: 'pdf',
                                    text: '{{ trans('file.PDF') }}',
                                    exportOptions: {
                                        columns: ':visible:Not(.not-exported)',
                                        modifier: {
                                            page: 'current'
                                        }
                                    },
                                    footer: true
                                },
                                {
                                    extend: 'csv',
                                    text: '{{ trans('file.CSV') }}',
                                    exportOptions: {
                                        columns: ':visible:Not(.not-exported)',
                                        modifier: {
                                            page: 'current'
                                        }
                                    },
                                    footer: true
                                },
                                {
                                    extend: 'print',
                                    text: '{{ trans('file.Print') }}',
                                    exportOptions: {
                                        columns: ':visible:Not(.not-exported)',
                                        modifier: {
                                            page: 'current'
                                        }
                                    },
                                    footer: true
                                },
                                {
                                    extend: 'colvis',
                                    text: '{{ trans('file.Column visibility') }}',
                                    columns: ':gt(0)'
                                },
                            ]
                        });

                        var ldms_experiedDate = $('#ldms_experiedDate');
                        ldms_experiedDate.datepicker({
                            format: "dd-mm-yyyy",
                            startDate: "<?php echo date('d-m-Y'); ?>",
                            autoclose: true,
                            todayHighlight: true
                        });

                        var createForm = $('#createForm');
                        createForm.on("click", function() {
                            var ldms_documentTitle = $.trim($('#ldms_documentTitle').val());
                            if (ldms_documentTitle == '') {
                                alert("Document Title can't be empty.");
                                $("#ldms_documentTitle").focus();
                                return false;
                            }
                            var ldms_email = $.trim($('#ldms_email').val());
                            if (ldms_email == '') {
                                alert("Alarm Sending Email can't be empty.");
                                $('#ldms_email').focus();
                                return false;
                            }
                            var ldms_documentvendor = $.trim($('#ldms_documentvendor').val());
                            if (ldms_documentvendor == '') {
                                alert("Name of Vendor can't be empty.");
                                $('#ldms_documentvendor').focus();
                                return false;
                            }
                            var ldms_documentdescriptiom = $.trim($('#ldms_documentdescriptiom').val());
                            if (ldms_documentdescriptiom == '') {
                                alert("Document Description can't be empty.");
                                $('#ldms_documentdescriptiom').focus();
                                return false;
                            }



                        });

                        var ldms_document_file = $("#ldms_documentFile");
                        ldms_document_file.change(function() {
                            var ldms_document_file_name = $("#ldms_document_file_name");
                            ldms_document_file_name.html($(":file").val());
                        });
                    </script>
                </div>
            </div>
        </div>



        <div id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['route' => 'document.import', 'method' => 'post', 'files' => true]) !!}
                    <div class="modal-header">
                        <span style="font-weight: 850;">Import Document</span>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <i><small>{{ trans('file.All field labels are required input fields.') }}</small></i><br><br>
                        <p>{{ trans('file.The correct column order is') }} (title, expiredDate(d-m-Y), email, mobile,
                            fileName) {{ trans('file.and you must follow this.') }}
                            {{ trans('file.Make sure expiredDate column is in text format.') }}
                            {{ trans('file.Files must be located in') }} public/document {{ trans('file.directory') }}.
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong>{{ trans('file.Upload File') }} *</strong></label>
                                    {{ Form::file('file', ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong> {{ trans('file.Sample File') }}</strong></label>
                                    <a href="../public/sample/sample-doc.csv" class="btn btn-info btn-block btn-md"><i
                                            class="fa fa-download"></i> {{ trans('file.Download') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="operation_value"></div>
                        <input type="submit" name="submit" value="{{ trans('file.Submit') }}"
                            class="btn btn-primary">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <script>
            let table = new DataTable('#document-table')
        </script>
    @endsection

-@extends('layouts.app')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>{{ session()->get('message') }}
        </div>
    @endif
    @if (session()->has('message1'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
    @endif
    @if ($errors->has('title'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><strong>{{ $errors->first('title') }}</strong></div>
    @endif

    <div class="container-fluid">
        <div class="float-end mb-2">


            {{-- ---------- Start Filter -------------- --}}
            <a href="#" class="btn btn-sm btn-primary action-item" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-filter bi bi-filter-square-fill"></i>
            </a>
            <div class="dropdown-menu  dropdown-steady" id="project_sort">
                <a class="dropdown-item active" href="#" data-val="created_at-desc">
                    <i class="ti ti-sort-descending"></i>{{ __('Newest') }}
                </a>
                <a class="dropdown-item" href="#" data-val="created_at-asc">
                    <i class="ti ti-sort-ascending"></i>{{ __('Oldest') }}
                </a>

                <a class="dropdown-item" href="#" data-val="project_name-desc">
                    <i class="ti ti-sort-descending-letters"></i>{{ __('From Z-A') }}
                </a>
                <a class="dropdown-item" href="#" data-val="project_name-asc">
                    <i class="ti ti-sort-ascending-letters"></i>{{ __('From A-Z') }}
                </a>
            </div>

            {{-- ---------- End Filter -------------- --}}


            {{-- ---------- Start Status Filter -------------- --}}
            <a href="#" class="btn btn-sm btn-primary action-item" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="btn-inner--icon">{{ __('Status') }}</span>
            </a>
            <div class="dropdown-menu  project-filter-actions dropdown-steady" id="project_status">
                <a class="dropdown-item filter-action filter-show-all pl-4 active" href="#">{{ __('Show All') }}</a>
                @foreach (\App\Models\Project::$project_status as $key => $val)
                    <a class="dropdown-item filter-action pl-4" href="#"
                        data-val="{{ $key }}">{{ __($val) }}</a>
                @endforeach
            </div>
            {{-- ---------- End Status Filter -------------- --}}


            @can('create project')
                <a href="#" data-toggle="modal" data-target="#client" class="btn btn-primary">
                    <i class="fa fa-plus"></i>

                </a>
            @endcan


        </div>
    </div>
    <div class="container">
        <div class="row min-750" id="project_view">
            @if (isset($projects) && !empty($projects) && count($projects) > 0)
                <div class="col-12">
                    <div class="row">

                        @foreach ($projects as $key => $project)
                            <div class="col-md-6 col-xxl-3">
                                <div class="card">
                                    <div class="card-header border-0 pb-0">
                                        <div class="d-flex align-items-center">
                                            <img {{ $project->img_image }} class="img-fluid wid-30 me-2" alt="">
                                            <h5 class="mb-0"><a class="text-dark"
                                                    href="{{ route('projects.show', $project) }}">{{ $project->project_name }}</a>
                                            </h5>
                                        </div>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi-three-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">

                                                    @can('create project')
                                                        <a class="dropdown-item" data-ajax-popup="true" data-size="md"
                                                            data-title="{{ __('Duplicate Project') }}"
                                                            data-url="{{ route('project.copy', [$project->id]) }}">
                                                            <i class="ti ti-copy"></i> <span>{{ __('Duplicate') }}</span>
                                                        </a>
                                                    @endcan
                                                    @can('edit project')
                                                        {{-- <a href="#!" data-size="lg" data-target="#editModal"
                                                            data-url="{{ route('projects.edit', $project->id) }}"
                                                            data-ajax-popup="true" class="dropdown-item"
                                                            data-bs-original-title="{{ __('Edit Project') }}">
                                                            <i class="ti ti-pencil"></i>
                                                            <span>{{ __('Edit') }}</span>
                                                        </a> --}}
                                                        <a href="#" class="dropdown-item" data-target="#editModal">
                                                            <i class="ti ti-pencil"></i>
                                                            <span>{{ __('Edit') }}</span>
                                                        </a>
                                                    @endcan
                                                    {{-- @can('edit project')
                                                        <a href="#!" data-size="lg"
                                                            data-url="{{ route('projects.edit', $project->id) }}"
                                                            data-ajax-popup="true" class="dropdown-item"
                                                            data-bs-original-title="{{ __('Edit Project') }}">
                                                            <i class="ti ti-pencil"></i>
                                                            <span>{{ __('Edit') }}</span>
                                                        </a>
                                                    @endcan --}}
                                                    @can('delete project')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['projects.destroy', $project->id]]) !!}
                                                        <a href="#!" class="dropdown-item bs-pass-para">
                                                            <i class="ti ti-archive"></i>
                                                            <span> {{ __('Delete') }}</span>
                                                        </a>

                                                        {!! Form::close() !!}
                                                    @endcan

                                                    @can('edit project')
                                                        <a href="#!" data-size="lg"
                                                            data-url="{{ route('invite.project.member.view', $project->id) }}"
                                                            data-ajax-popup="true" class="dropdown-item"
                                                            data-bs-original-title="{{ __('Invite User') }}">
                                                            <i class="ti ti-send"></i>
                                                            <span>{{ __('Invite User') }}</span>
                                                        </a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2 justify-content-between">
                                            <div class="col-auto">
                                                {{-- <span
                                                    class="badge rounded-pill bg-{{ \App\Models\Project::$status_color[$project->status] }}">{{ __(\App\Models\Project::$project_status[$project->status]) }}</span> --}}
                                            </div>

                                        </div>
                                        <p class="text-muted text-sm mt-3">{{ $project->description }}</p>
                                        <small>{{ __('MEMBERS') }}</small>
                                        <div class="user-group">
                                            @if (isset($project->users) && !empty($project->users) && count($project->users) > 0)
                                                @foreach ($project->users as $key => $user)
                                                    @if ($key < 3)
                                                        <a href="#" class="avatar rounded-circle avatar-sm">
                                                            <img @if ($user->avatar) src="{{ asset('/storage/uploads/avatar/' . $user->avatar) }}" @else src="{{ asset('/storage/uploads/avatar/avatar.png') }}" @endif
                                                                alt="image" data-bs-toggle="tooltip"
                                                                title="{{ $user->first_name }}">
                                                        </a>
                                                    @else
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="card mb-0 mt-3">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6
                                                        class="mb-0 {{ strtotime($project->start_date) < time() ? 'text-danger' : '' }}">
                                                        {{ Modules\Accounting\Models\Utility::getDateFormated($project->start_date) }}
                                                    </h6>
                                                    <p class="text-muted text-sm mb-0">{{ __('Start Date') }}</p>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <h6 class="mb-0">
                                                        {{ Modules\Accounting\Models\Utility::getDateFormated($project->end_date) }}
                                                    </h6>
                                                    <p class="text-muted text-sm mb-0">{{ __('Due Date') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="col-xl-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center mb-0">{{ __('No Projects Found.') }}</h6>
                    </div>
                </div>
            </div>
        @endif


    </div>
    <!--the end of the content -->




</div>
<!--the end of the container -->




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

                                            {!! Form::select('client', $clients, null, ['class' => 'form-control form-select']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ldms_documentTitle">{{ trans('User') }}</label>
                                    <div class="form-group-inner">
                                        <div class="field-outer">

                                            {!! Form::select('user[]', $users, null, ['class' => 'form-control form-select']) !!}

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

                                        {!! Form::textarea('description', null, ['class' => 'form-control form-textarea']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group">
                                <label for="ldms_documentTitle">{{ trans('Status') }}</label>
                                <div class="form-group-inner">
                                    <div class="field-outer">
                                        {!! Form::select('status', $status, null, ['class' => 'form-control form-select']) !!}

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


            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <!-- Form fields for editing -->
                        <!-- Example: -->

                        <input type="text" id="editName" name="name">
                        <input type="text" id="editDescription" name="description">

                        <div class="col-md-12">
                            {!! csrf_field() !!}
                            <div class="row-12">

                                <div class="form-group">
                                    <label for="ldms_documentTitle">{{ trans('Project Name') }}</label>
                                    <div class="form-group-inner">
                                        <div class="field-outer">
                                            <input class="form-control" type="text" name="project_name"
                                                id="project_name"
                                                placeholder="{{ trans('Enter Project Name') }}">
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
                                                id="project_img">
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
                                                    id="start_date">
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
                                                    id="end_date">
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

                                                {!! Form::select('client', $clients, null, ['class' => 'form-control form-select','id'=>'client']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ldms_documentTitle">{{ trans('User') }}</label>
                                        <div class="form-group-inner">
                                            <div class="field-outer">

                                                {!! Form::select('user[]', $users, null, ['class' => 'form-control form-select','id'=>'users']) !!}

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
                                                    id="budget">

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
                                                    id="estimated_hours">

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


                                            {!! Form::textarea('description', null, ['class' => 'form-control form-textarea','id'=>'description']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group">
                                    <label for="ldms_documentTitle">{{ trans('Status') }}</label>
                                    <div class="form-group-inner">
                                        <div class="field-outer">
                                            {!! Form::select('status', $status, null, ['class' => 'form-control form-select','id'=>'status']) !!}

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
                                                id="tag">

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <input type="hidden" id="editItemId" name="item_id">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var sort = 'created_at-desc';
            var status = '';
            ajaxFilterProjectView('created_at-desc');
            $(".project-filter-actions").on('click', '.filter-action', function(e) {
                if ($(this).hasClass('filter-show-all')) {
                    $('.filter-action').removeClass('active');
                    $(this).addClass('active');
                } else {
                    $('.filter-show-all').removeClass('active');
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $(this).blur();
                    } else {
                        $(this).addClass('active');
                    }
                }

                var filterArray = [];
                var url = $(this).parents('.project-filter-actions').attr('data-url');
                $('div.project-filter-actions').find('.active').each(function() {
                    filterArray.push($(this).attr('data-val'));
                });

                status = filterArray;

                ajaxFilterProjectView(sort, $('#project_keyword').val(), status);
            });

            // when change sorting order
            $('#project_sort').on('click', 'a', function() {
                sort = $(this).attr('data-val');
                ajaxFilterProjectView(sort, $('#project_keyword').val(), status);
                $('#project_sort a').removeClass('active');
                $(this).addClass('active');
            });

            // when searching by project name
            $(document).on('keyup', '#project_keyword', function() {
                ajaxFilterProjectView(sort, $(this).val(), status);
            });


            $(document).on('click', '.invite_usr', function() {
                var project_id = $('#project_id').val();
                var user_id = $(this).attr('data-id');

                $.ajax({
                    url: '{{ route('invite.project.user.member') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        'project_id': project_id,
                        'user_id': user_id,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.code == '200') {
                            show_toastr(data.status, data.success, 'success')
                            setInterval('location.reload()', 5000);
                        } else if (data.code == '404') {
                            show_toastr(data.status, data.errors, 'error')
                        }
                    }
                });
            });
        });

        var currentRequest = null;

        function ajaxFilterProjectView(project_sort, keyword = '', status = '') {
            var mainEle = $('#project_view');
            var view = '{{ $view }}';
            var data = {
                view: view,
                sort: project_sort,
                keyword: keyword,
                status: status,
            }

            currentRequest = $.ajax({
                url: '{{ route('filter.project.view') }}',
                data: data,
                beforeSend: function() {
                    if (currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function(data) {
                    mainEle.html(data.html);
                    $('[id^=fire-modal]').remove();
                    loadConfirm();
                }
            });
        }
    </script>


<script>
    function openEditModal(itemId) {
        $.ajax({
            url: '/projects/' + itemId + '/edit',
            type: 'GET',
            success: function(response) {
                $('#project_name').val(response.project_name);
                $('#start_date').val(response.start_date);
                $('#end_date').val(response.end_date);
                $('#client').val(response.client);
                $('#user').val(response.user_id);
                $('#budget').val(response.budget);
                $('#estimated_hours').val(response.estimated_hours);
                $('#description').val(response.description);
                $('#status').val(response.status);
                $('#tag').val(response.tag);
                $('#editItemId').val(response.Id);
                $('#editModal').modal('show');
            }
        });
    }

    $('#editForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: '/projects/' + $('#editItemId').val(),
            type: 'PUT',
            data: formData,
            success: function(response) {
                $('#editModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                location.reload();
            }
        });
    });
</script>

@endsection

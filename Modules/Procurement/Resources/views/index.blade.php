@extends('layouts.app')

@section('content')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <div class="container">
        <div class=" container-fluid">
            {{-- <a class="btn btn-success float-end" href="#exampleModal">New</a> --}}
            <button type="button" class="btn btn-success float-end" data-toggle="modal"
                data-target="#exampleModal">New</button>
        </div>
        <table class="table mt-4 table-striped" id="procurement">
            <thead>
                <tr>
                    <th scope="col">TRX ID</th>
                    <th scope="col">STAFF NAME</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">PROC.TYPE</th>
                    <th scope="col">ISSUE DATE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($procurement as $item)
                    <tr>
                        <th>{{ $item->reference_number }}</th>
                        <td>{{ $item->user->first_name . '' . $item->user->last_name }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->issue_date }}</td>
                        <td>
                            @if ($item->status == 0)
                                <span class=" fw-bolder text-danger">
                                    REJECTED
                                </span>
                            @elseif ($item->status = 1)
                                <span class=" fw-bolder text-warning"> Awaiting Supervisor Approval</span>
                            @elseif ($item->status = 2)
                                <span class=" fw-bolder text-warning"> Awaiting HOD Approval</span>
                            @else
                                <span class=" fw-bolder text-success"> Approved</span>
                            @endif
                        </td>
                        <td>
                            {{-- {!! Form::open(['route' => ['procurement.destroy', $item->id], 'method' => 'delete']) !!} --}}
                            <div class="btn-group">
                                {{-- <a href="{{ route('procurement.show', [$item->id]) }}" class='btn btn-default btn-xs'>
                                    View
                                </a> --}}
                                {{-- <a href="{{ route('unithead', [$item->id]) }}" class='btn btn-default btn-xs'>
                                    Modify
                                </a> --}}

                                {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!} --}}
                            </div>
                            {!! Form::close() !!}
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        <script>
            let table = new DataTable('#procurement')
        </script>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> New Procurement </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form class="form" method="POST" enctype="multipart/form-data"
                        action="{{ route('procurement.store') }}">
                        @csrf
                        <div class=" row">
                            <div class="form-group">
                                <label for=""> Select The Type</label>
                                <select class="form-control form-select" name="type" required id="">
                                    @foreach ($type as $item)
                                        <option value="{{ $item }}"> {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Empoyee Name:</label>
                                    @if (auth()->check())
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                        <input type="text" class="form-control" name="employee_name" readonly
                                            value="{{ auth()->user()->first_name . '  ' . auth()->user()->middle_name . ' ' . auth()->user()->last_name }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Issue Date:</label>
                                    <input type="date" readonly value="" name="issue_date" class="form-control"
                                        id="issue_date">

                                </div>
                                <script>
                                    document.getElementById('issue_date').valueAsDate = new Date();
                                </script>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Refrence Number :</label>
                                    <input type="text" readonly class="form-control" name="reference_number"
                                        id="">
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                    <input type="title" name="title" class="form-control" id="recipient-name">
                                </div>
                            </div>
                        </div>


                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                $('#exampleModal').on('hidden.bs.modal', function() {
                                    // Reset modal content when modal is closed
                                    $(this).find('form')[0].reset();
                                });

                                // Add event listener for changes in quantity and rate inputs
                                $(document).on('input', '.quantity, .rate', function() {
                                    updateAmounts(); // Recalculate amounts
                                });

                                // Function to recalculate amounts for all rows
                                function updateAmounts() {
                                    $('.entry').each(function() {
                                        var quantity = $(this).find('.quantity').val();
                                        var rate = $(this).find('.rate').val();
                                        var amount = parseFloat(quantity) * parseFloat(rate);
                                        if (!isNaN(amount)) {
                                            $(this).find('.amount').val(amount.toFixed(2));
                                        } else {
                                            $(this).find('.amount').val('');
                                        }
                                    });
                                }

                                // Event listener for form submission
                                $('#submitForm').click(function() {
                                    // Perform form validation here if needed
                                    // If form is valid, submit the form
                                    // Otherwise, prevent submission
                                    validateForm()
                                });
                            });
                        </script>

                        <div class="card">

                            <div class="card-header">

                                <div class="card-title">
                                    <span>REQUISITION </span>

                                </div>
                                <div class="card-body">

                                    <div class="row targetDiv" id="div0">
                                        <div class="col-md-12">
                                            <div id="group1" class="fvrduplicate">
                                                <div class="row entry">
                                                    <div class="col-12 col-md-5">
                                                        <div class="form-group">
                                                            <label>ITEMS </label>
                                                            <input class="form-control form-control-sm" name="item[]"
                                                                type="text" placeholder="">
                                                        </div>
                                                    </div>

                                                    <div class="col-4 col-md-5">
                                                        <div class="form-group">
                                                            <label>QUANTITY </label>
                                                            <input class="form-control form-control-sm quantity"
                                                                name="quantity[]" type="number" placeholder=" ">
                                                        </div>
                                                    </div>


                                                    <div class="col-4 col-md-5">
                                                        <div class="form-group">
                                                            <label>RATE</label>
                                                            <input class="form-control form-control-sm rate"
                                                                name="rate[]" type="number" placeholder="">
                                                        </div>
                                                    </div>



                                                    <div class="col-4 col-md-5">
                                                        <div class="form-group">
                                                            <label>AMOUNT</label>
                                                            <input class="form-control form-control-sm amount" readonly
                                                                name="amount[]" type="text" placeholder="">
                                                        </div>
                                                    </div>



                                                    <div class="col-xs-12 col-md-2">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <button type="button" class="btn btn-success btn-sm btn-add">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-6">

                                <div class="form-group">
                                    <input type="file" name="document" class="form-control" id="file">
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <select class=" form-control form-select" name="document" id="select">
                                        @foreach ($select as $type)
                                            <option value="{{ $type }}"> {{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  name="status" value="1" class="btn btn-primary">Submit</button>
                </div>
                </form>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> --}}
            </div>
        </div>

        <script>
            $(function() {
                $(document).on('click', '.btn-add', function(e) {
                    e.preventDefault();
                    var controlForm = $(this).closest('.fvrduplicate'),
                        currentEntry = $(this).parents('.entry:first'),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);
                    newEntry.find('input').val('');
                    controlForm.find('.entry:not(:last) .btn-add')
                        .removeClass('btn-add').addClass('btn-remove')
                        .removeClass('btn-success').addClass('btn-danger')
                        .html('<i class="fa fa-minus" aria-hidden="true">-</i>');
                }).on('click', '.btn-remove', function(e) {
                    $(this).closest('.entry').remove();
                    return false;
                });
            });
        </script>



        <script>
            const inputgroup = document.querySelector('.atp');
            inputgroup.class = 'row';

            function addmore() {
                const kpibox = document.createElement('input');
                const krabox = document.createElement('input');
                const jobbox = document.createElement('input');
                const timebox = document.createElement('input');
                kpibox.type = "text";
                kpibox.name = 'key_performance_indicators';
                kpibox.class = 'form-control';
                kpibox.placeholder = 'yea';

                krabox.type = "text";
                krabox.name = 'key_result_area';
                krabox.class = 'form-control';
                krabox.placeholder = 'key result area';

                jobbox.type = "text";
                jobbox.name = 'job_objective';
                jobbox.class = 'form-control';
                jobbox.placeholder = 'job objective';

                timebox.type = "text";
                timebox.name = 'timeline';
                timebox.class = 'form-control';
                timebox.placeholder = 'timeline';

                const div = document.createElement('div');
                div.class = 'col-3';

                inputgroup.appendChild(div);
                div.appendChild(kpibox);
                div.appendChild(timebox);
                div.appendChild(jobbox);
                div.appendChild(krabox);
            }
        </script>

        <script>
            function validateForm() {
                var fileInput = document.getElementById('file');
                var selectInput = document.getElementById('select');

                if (!fileInput.files.length && selectInput.value === '') {
                    alert('Please select a file or choose an option');
                    return false; // Prevent form submission
                }

                return true; // Allow form submission
            }
        </script>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.quantity, .rate').on('input', function() {
                var quantity = $(this).closest('.row').find('.quantity').val();
                var rate = $(this).closest('.row').find('.rate').val();
                var amount = parseFloat(quantity) * parseFloat(rate);

                if (!isNaN(amount)) {
                    $(this).closest('.row').find('.amount').val(amount.toFixed(2));
                } else {
                    $(this).closest('.row').find('.amount').val('');
                }
            });
        });
    </script>
@endsection

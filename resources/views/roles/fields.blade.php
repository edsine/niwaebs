
 <!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
        
        <div class="form-group col-sm-12">
        <label for="permissions[]">Permissions:</label>
        <div class="flex flex-wrap justify-start mb-4">
        <div class="row">
        
            <div class="row">
                <h4 class="mb-3 mt-5">user</h4>
                <div class="col-12 mb-3">
                    <a href="#" class="check-all-link" data-group="user">Select All</a> <!-- Add Check All link -->
                </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 user" name="permissions[]" type="checkbox" value="1" id="permissions[]">
                        <span class="">create user</span>
                    </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 user" name="permissions[]" type="checkbox" value="2" id="permissions[]">
                        <span class="">read user</span>
                    </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 user" name="permissions[]" type="checkbox" value="3" id="permissions[]">
                        <span class="">update user</span>
                    </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 user" name="permissions[]" type="checkbox" value="4" id="permissions[]">
                        <span class="">delete user</span>
                    </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 user" name="permissions[]" type="checkbox" value="163" id="permissions[]">
                        <span class="">view user managment module</span>
                    </div>
                            </div>
                    <div class="row">
                <h4 class="mb-3 mt-5">role</h4>
                <div class="col-12 mb-3">
                    <a href="#" class="check-all-link" data-group="role">Select All</a> <!-- Add Check All link -->
                </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 role" name="permissions[]" type="checkbox" value="5" id="permissions[]">
                        <span class="">create role</span>
                    </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 role" name="permissions[]" type="checkbox" value="6" id="permissions[]">
                        <span class="">read role</span>
                    </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 role" name="permissions[]" type="checkbox" value="7" id="permissions[]">
                        <span class="">update role</span>
                    </div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 role" name="permissions[]" type="checkbox" value="8" id="permissions[]">
                        <span class="">delete role</span>
                    </div>
                            </div>
                            <div class="row">
                                <h4 class="mb-3 mt-5">files</h4>
                                <div class="col-12 mb-3">
                                    <a href="#" class="check-all-link" data-group="files">Select All</a> <!-- Add Check All link -->
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-checkbox h-4 w-4 files" name="permissions[]" type="checkbox" value="173" id="permissions[]">
                                    <span class="">create files</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-checkbox h-4 w-4 files" name="permissions[]" type="checkbox" value="174" id="permissions[]">
                                    <span class="">read files</span>
                                </div>
                                <div class="col-6 mb-3">
                                    <input class="form-checkbox h-4 w-4 files" name="permissions[]" type="checkbox" value="175" id="permissions[]">
                                    <span class="">update files</span>
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="mb-3 mt-5">service</h4>
                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 service" name="permissions[]" type="checkbox" value="164" id="permissions[]">
                        <span class="">view service applications module</span>
                    </div>
                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 service" name="permissions[]" type="checkbox" value="166" id="permissions[]">
                        <span class="">view service application setup module</span>
                    </div>
                </div>
                
                    <div class="row">
                <h4 class="mb-3 mt-5">view incoming documents module</h4>
                <div class="col-12 mb-3">
                {{--     <a href="#" class="check-all-link" data-group="view incoming documents module">Select All</a> <!-- Add Check All link -->
                 --}}</div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 view incoming documents module" name="permissions[]" type="checkbox" value="170" id="permissions[]">
                        <span class="">view incoming documents module</span>
                    </div>
                            </div>
                    <div class="row">
                <h4 class="mb-3 mt-5">view incoming documents</h4>
                <div class="col-12 mb-3">
                {{--     <a href="#" class="check-all-link" data-group="view incoming documents">Select All</a> <!-- Add Check All link -->
                 --}}</div>
                                    <div class="col-6 mb-3">
                        <input class="form-checkbox h-4 w-4 view incoming documents" name="permissions[]" type="checkbox" value="171" id="permissions[]">
                        <span class="">view incoming documents</span>
                    </div>
                            </div>
        
        </div>
        </div>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        @push('page_scripts')
        <script>
            $(document).ready(function() {
            $('.check-all-link').click(function(e) {
                e.preventDefault();
                var groupName = $(this).data('group');
                var groupCheckboxes = $('.' + groupName);
        
                // Check if any checkbox in the group is checked
                var anyChecked = groupCheckboxes.is(':checked');
        
                // Toggle the checked state of all checkboxes in the group
                groupCheckboxes.prop('checked', !anyChecked);
            });
        });
        
            </script>
        @endpush
        
        </div>
        
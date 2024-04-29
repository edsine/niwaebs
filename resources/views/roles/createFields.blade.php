
    <!-- Name Field -->
<div class="form-group col-sm-12">
<label for="name">Name</label>
<input class="form-control" name="name" type="text" id="name">
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
    {{-- <div class="row">
<h4 class="mb-3 mt-5">client</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="client">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 client" name="permissions[]" type="checkbox" value="9" id="permissions[]">
        <span class="">create client</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 client" name="permissions[]" type="checkbox" value="10" id="permissions[]">
        <span class="">manage client</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 client" name="permissions[]" type="checkbox" value="11" id="permissions[]">
        <span class="">edit client</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">project</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="project">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="12" id="permissions[]">
        <span class="">create project</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="13" id="permissions[]">
        <span class="">manage project</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="14" id="permissions[]">
        <span class="">view project</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="15" id="permissions[]">
        <span class="">edit project</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="16" id="permissions[]">
        <span class="">delete project</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="25" id="permissions[]">
        <span class="">share project</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="26" id="permissions[]">
        <span class="">create project task</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="27" id="permissions[]">
        <span class="">manage project task</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="28" id="permissions[]">
        <span class="">view project task</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="30" id="permissions[]">
        <span class="">manage project task stage</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="31" id="permissions[]">
        <span class="">create project task stage</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="32" id="permissions[]">
        <span class="">delete project task stage</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="91" id="permissions[]">
        <span class="">send documents to project management and procurement</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 project" name="permissions[]" type="checkbox" value="92" id="permissions[]">
        <span class="">view project management</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">milestone</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="milestone">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 milestone" name="permissions[]" type="checkbox" value="17" id="permissions[]">
        <span class="">create milestone</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 milestone" name="permissions[]" type="checkbox" value="18" id="permissions[]">
        <span class="">edit milestone</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 milestone" name="permissions[]" type="checkbox" value="19" id="permissions[]">
        <span class="">delete milestone</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 milestone" name="permissions[]" type="checkbox" value="20" id="permissions[]">
        <span class="">view milestone</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">bug</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="bug">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 bug" name="permissions[]" type="checkbox" value="21" id="permissions[]">
        <span class="">edit bug report</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 bug" name="permissions[]" type="checkbox" value="22" id="permissions[]">
        <span class="">delete bug report</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 bug" name="permissions[]" type="checkbox" value="23" id="permissions[]">
        <span class="">move bug report</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">view grant chart</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="view grant chart">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 view grant chart" name="permissions[]" type="checkbox" value="24" id="permissions[]">
        <span class="">view grant chart</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">timesheet</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="timesheet">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 timesheet" name="permissions[]" type="checkbox" value="29" id="permissions[]">
        <span class="">manage timesheet</span>
    </div>
            </div> --}}
    <div class="row">
<h4 class="mb-3 mt-5">areamanager</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="areamanager">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 areamanager" name="permissions[]" type="checkbox" value="33" id="permissions[]">
        <span class="">view areamanager dashboard</span>
    </div>
            </div>
    <div class="row">
<h4 class="mb-3 mt-5">md</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="md">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 md" name="permissions[]" type="checkbox" value="34" id="permissions[]">
        <span class="">view md dashboard</span>
    </div>
                    {{-- <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 md" name="permissions[]" type="checkbox" value="36" id="permissions[]">
        <span class="">approve as md</span>
    </div> --}}
            </div>
    <div class="row">
<h4 class="mb-3 mt-5">office_coordination</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="office_coordination">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 office_coordination" name="permissions[]" type="checkbox" value="35" id="permissions[]">
        <span class="">view area office coordination</span>
    </div>
            </div>
    {{-- <div class="row">
<h4 class="mb-3 mt-5">hod</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="hod">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 hod" name="permissions[]" type="checkbox" value="37" id="permissions[]">
        <span class="">approve as hod</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">account</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="account">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 account" name="permissions[]" type="checkbox" value="38" id="permissions[]">
        <span class="">approve as account</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 account" name="permissions[]" type="checkbox" value="125" id="permissions[]">
        <span class="">read account statement</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">regional</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="regional">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 regional" name="permissions[]" type="checkbox" value="39" id="permissions[]">
        <span class="">approve as regional manager</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">medical</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="medical">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 medical" name="permissions[]" type="checkbox" value="40" id="permissions[]">
        <span class="">approve as medical team</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">office</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="office">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 office" name="permissions[]" type="checkbox" value="41" id="permissions[]">
        <span class="">approve as head office</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">hr</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="hr">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 hr" name="permissions[]" type="checkbox" value="42" id="permissions[]">
        <span class="">approve as hr</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 hr" name="permissions[]" type="checkbox" value="106" id="permissions[]">
        <span class="">access hr module</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">folder</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="folder">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="43" id="permissions[]">
        <span class="">create folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="44" id="permissions[]">
        <span class="">read folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="45" id="permissions[]">
        <span class="">update folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="46" id="permissions[]">
        <span class="">delete folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="51" id="permissions[]">
        <span class="">read any folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="52" id="permissions[]">
        <span class="">update any folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="53" id="permissions[]">
        <span class="">delete any folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="57" id="permissions[]">
        <span class="">read branch folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="58" id="permissions[]">
        <span class="">update branch folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="59" id="permissions[]">
        <span class="">delete branch folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="63" id="permissions[]">
        <span class="">read department folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="64" id="permissions[]">
        <span class="">update department folder</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 folder" name="permissions[]" type="checkbox" value="65" id="permissions[]">
        <span class="">delete department folder</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">document</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="document">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="47" id="permissions[]">
        <span class="">create document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="48" id="permissions[]">
        <span class="">read document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="49" id="permissions[]">
        <span class="">update document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="50" id="permissions[]">
        <span class="">delete document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="54" id="permissions[]">
        <span class="">read any document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="55" id="permissions[]">
        <span class="">update any document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="56" id="permissions[]">
        <span class="">delete any document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="60" id="permissions[]">
        <span class="">read branch document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="61" id="permissions[]">
        <span class="">update branch document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="62" id="permissions[]">
        <span class="">delete branch document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="66" id="permissions[]">
        <span class="">read department document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="67" id="permissions[]">
        <span class="">update department document</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 document" name="permissions[]" type="checkbox" value="68" id="permissions[]">
        <span class="">delete department document</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">memo</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="memo">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 memo" name="permissions[]" type="checkbox" value="69" id="permissions[]">
        <span class="">create memo</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 memo" name="permissions[]" type="checkbox" value="70" id="permissions[]">
        <span class="">read memo</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 memo" name="permissions[]" type="checkbox" value="71" id="permissions[]">
        <span class="">update memo</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 memo" name="permissions[]" type="checkbox" value="72" id="permissions[]">
        <span class="">delete memo</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 memo" name="permissions[]" type="checkbox" value="73" id="permissions[]">
        <span class="">assign memo to department</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 memo" name="permissions[]" type="checkbox" value="108" id="permissions[]">
        <span class="">send memo</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">assignment</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="assignment">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assignment" name="permissions[]" type="checkbox" value="74" id="permissions[]">
        <span class="">read department-memo assignment</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assignment" name="permissions[]" type="checkbox" value="75" id="permissions[]">
        <span class="">delete memo-department assignment</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assignment" name="permissions[]" type="checkbox" value="77" id="permissions[]">
        <span class="">read user-memo assignment</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assignment" name="permissions[]" type="checkbox" value="78" id="permissions[]">
        <span class="">delete memo-user assignment</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assignment" name="permissions[]" type="checkbox" value="84" id="permissions[]">
        <span class="">read department-correspondence assignment</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assignment" name="permissions[]" type="checkbox" value="85" id="permissions[]">
        <span class="">delete correspondence-department assignment</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assignment" name="permissions[]" type="checkbox" value="87" id="permissions[]">
        <span class="">read user-correspondence assignment</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assignment" name="permissions[]" type="checkbox" value="88" id="permissions[]">
        <span class="">delete correspondence-user assignment</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">memo_user</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="memo_user">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 memo_user" name="permissions[]" type="checkbox" value="76" id="permissions[]">
        <span class="">assign memo to user</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">correspondence</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="correspondence">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 correspondence" name="permissions[]" type="checkbox" value="79" id="permissions[]">
        <span class="">create correspondence</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 correspondence" name="permissions[]" type="checkbox" value="80" id="permissions[]">
        <span class="">read correspondence</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 correspondence" name="permissions[]" type="checkbox" value="81" id="permissions[]">
        <span class="">update correspondence</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 correspondence" name="permissions[]" type="checkbox" value="82" id="permissions[]">
        <span class="">delete correspondence</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 correspondence" name="permissions[]" type="checkbox" value="83" id="permissions[]">
        <span class="">assign correspondence to department</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 correspondence" name="permissions[]" type="checkbox" value="89" id="permissions[]">
        <span class="">add comment to correspondence</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">correspondence_user</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="correspondence_user">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 correspondence_user" name="permissions[]" type="checkbox" value="86" id="permissions[]">
        <span class="">assign correspondence to user</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">legal</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="legal">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 legal" name="permissions[]" type="checkbox" value="90" id="permissions[]">
        <span class="">send documents to legal and procurement</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">access qgis and arcgis</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="access qgis and arcgis">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 access qgis and arcgis" name="permissions[]" type="checkbox" value="93" id="permissions[]">
        <span class="">access qgis and arcgis</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">survey</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="survey">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 survey" name="permissions[]" type="checkbox" value="94" id="permissions[]">
        <span class="">access iot for survey</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 survey" name="permissions[]" type="checkbox" value="96" id="permissions[]">
        <span class="">send documents to survey department</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">marine</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="marine">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 marine" name="permissions[]" type="checkbox" value="95" id="permissions[]">
        <span class="">send documents to marine department</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 marine" name="permissions[]" type="checkbox" value="114" id="permissions[]">
        <span class="">view marine dashboard</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">invoices</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="invoices">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 invoices" name="permissions[]" type="checkbox" value="97" id="permissions[]">
        <span class="">view and approve invoices</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">salary</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="salary">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 salary" name="permissions[]" type="checkbox" value="98" id="permissions[]">
        <span class="">view salary module</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">gifmis</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="gifmis">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 gifmis" name="permissions[]" type="checkbox" value="99" id="permissions[]">
        <span class="">access gifmis</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">finance</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="finance">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 finance" name="permissions[]" type="checkbox" value="100" id="permissions[]">
        <span class="">send documents to finance department</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">asset</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="asset">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 asset" name="permissions[]" type="checkbox" value="101" id="permissions[]">
        <span class="">access asset management vessel cargo data</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 asset" name="permissions[]" type="checkbox" value="107" id="permissions[]">
        <span class="">view asset management</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 asset" name="permissions[]" type="checkbox" value="154" id="permissions[]">
        <span class="">read asset manager dashboard</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 asset" name="permissions[]" type="checkbox" value="158" id="permissions[]">
        <span class="">read asset types</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 asset" name="permissions[]" type="checkbox" value="162" id="permissions[]">
        <span class="">read asset manager reports</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 asset" name="permissions[]" type="checkbox" value="169" id="permissions[]">
        <span class="">view asset manager module</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">crm</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="crm">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 crm" name="permissions[]" type="checkbox" value="102" id="permissions[]">
        <span class="">view crm module</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">finance_marine</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="finance_marine">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 finance_marine" name="permissions[]" type="checkbox" value="103" id="permissions[]">
        <span class="">view finance and marine module</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">access calendar event planner</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="access calendar event planner">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 access calendar event planner" name="permissions[]" type="checkbox" value="104" id="permissions[]">
        <span class="">access calendar event planner</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">view all events calendar</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="view all events calendar">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 view all events calendar" name="permissions[]" type="checkbox" value="105" id="permissions[]">
        <span class="">view all events calendar</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">view and filter area officers data</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="view and filter area officers data">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 view and filter area officers data" name="permissions[]" type="checkbox" value="109" id="permissions[]">
        <span class="">view and filter area officers data</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">debtors</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="debtors">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 debtors" name="permissions[]" type="checkbox" value="110" id="permissions[]">
        <span class="">view debtors list</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">clients</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="clients">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 clients" name="permissions[]" type="checkbox" value="111" id="permissions[]">
        <span class="">view clients list</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">view private jets list</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="view private jets list">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 view private jets list" name="permissions[]" type="checkbox" value="112" id="permissions[]">
        <span class="">view private jets list</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">locations</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="locations">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 locations" name="permissions[]" type="checkbox" value="113" id="permissions[]">
        <span class="">view operational locations list</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 locations" name="permissions[]" type="checkbox" value="161" id="permissions[]">
        <span class="">read locations</span>
    </div>
            </div> --}}
    <div class="row">
<h4 class="mb-3 mt-5">engineering</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="engineering">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 engineering" name="permissions[]" type="checkbox" value="115" id="permissions[]">
        <span class="">view engineering dashboard</span>
    </div>
            </div>
    <div class="row">
<h4 class="mb-3 mt-5">finance_account</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="finance_account">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 finance_account" name="permissions[]" type="checkbox" value="116" id="permissions[]">
        <span class="">view finance and account dashboard</span>
    </div>
            </div>
    <div class="row">
<h4 class="mb-3 mt-5">audit</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="audit">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 audit" name="permissions[]" type="checkbox" value="117" id="permissions[]">
        <span class="">view audit dashboard</span>
    </div>
            </div>
    <div class="row">
<h4 class="mb-3 mt-5">corporate</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="corporate">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 corporate" name="permissions[]" type="checkbox" value="118" id="permissions[]">
        <span class="">view corporate affairs dashboard</span>
    </div>
            </div>
   {{--  <div class="row">
<h4 class="mb-3 mt-5">vendors</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="vendors">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 vendors" name="permissions[]" type="checkbox" value="119" id="permissions[]">
        <span class="">read vendors</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">read departmental requistion</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="read departmental requistion">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 read departmental requistion" name="permissions[]" type="checkbox" value="120" id="permissions[]">
        <span class="">read departmental requistion</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">audit_requisition</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="audit_requisition">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 audit_requisition" name="permissions[]" type="checkbox" value="121" id="permissions[]">
        <span class="">read audit requisition</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">legal_requisition</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="legal_requisition">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 legal_requisition" name="permissions[]" type="checkbox" value="122" id="permissions[]">
        <span class="">read legal requisition</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">md_requisition</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="md_requisition">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 md_requisition" name="permissions[]" type="checkbox" value="123" id="permissions[]">
        <span class="">read md requisition</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">finance_requisition</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="finance_requisition">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 finance_requisition" name="permissions[]" type="checkbox" value="124" id="permissions[]">
        <span class="">read finance requisition</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">invoice</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="invoice">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 invoice" name="permissions[]" type="checkbox" value="126" id="permissions[]">
        <span class="">read invoice summary</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">read bill summary</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="read bill summary">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 read bill summary" name="permissions[]" type="checkbox" value="127" id="permissions[]">
        <span class="">read bill summary</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">read product stock</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="read product stock">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 read product stock" name="permissions[]" type="checkbox" value="128" id="permissions[]">
        <span class="">read product stock</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">read cash flow</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="read cash flow">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 read cash flow" name="permissions[]" type="checkbox" value="129" id="permissions[]">
        <span class="">read cash flow</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">income</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="income">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 income" name="permissions[]" type="checkbox" value="130" id="permissions[]">
        <span class="">read income summary</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">expense</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="expense">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 expense" name="permissions[]" type="checkbox" value="131" id="permissions[]">
        <span class="">read expense summary</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">income_expense</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="income_expense">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 income_expense" name="permissions[]" type="checkbox" value="132" id="permissions[]">
        <span class="">read income vs expense summary</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">tax</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="tax">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 tax" name="permissions[]" type="checkbox" value="133" id="permissions[]">
        <span class="">read tax summary</span>
    </div>
            </div> --}}
    <div class="row">
<h4 class="mb-3 mt-5">approval</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="approval">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 approval" name="permissions[]" type="checkbox" value="134" id="permissions[]">
        <span class="">read approval request</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 approval" name="permissions[]" type="checkbox" value="135" id="permissions[]">
        <span class="">read approval appraisal</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 approval" name="permissions[]" type="checkbox" value="136" id="permissions[]">
        <span class="">read approval types</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 approval" name="permissions[]" type="checkbox" value="138" id="permissions[]">
        <span class="">read documents approval</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 approval" name="permissions[]" type="checkbox" value="165" id="permissions[]">
        <span class="">view approval module</span>
    </div>
            </div>
    {{-- <div class="row">
<h4 class="mb-3 mt-5">payments_approval</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="payments_approval">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 payments_approval" name="permissions[]" type="checkbox" value="137" id="permissions[]">
        <span class="">read payments approval</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">payments</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="payments">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 payments" name="permissions[]" type="checkbox" value="139" id="permissions[]">
        <span class="">approve or decline payments</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">service</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="service">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 service" name="permissions[]" type="checkbox" value="140" id="permissions[]">
        <span class="">approve or decline service application documents</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 service" name="permissions[]" type="checkbox" value="141" id="permissions[]">
        <span class="">read service applications</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 service" name="permissions[]" type="checkbox" value="147" id="permissions[]">
        <span class="">approve service application as area officer</span>
    </div>
                    
                    
            </div> --}}
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

    {{-- <div class="row">
<h4 class="mb-3 mt-5">fee</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="fee">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 fee" name="permissions[]" type="checkbox" value="142" id="permissions[]">
        <span class="">approve or decline processing fee</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">inspection_fee</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="inspection_fee">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 inspection_fee" name="permissions[]" type="checkbox" value="143" id="permissions[]">
        <span class="">approve or decline inspection fee</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">inspection</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="inspection">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 inspection" name="permissions[]" type="checkbox" value="144" id="permissions[]">
        <span class="">set inspection status</span>
    </div>
            </div> --}}
   {{--  <div class="row">
<h4 class="mb-3 mt-5">equipment_invoice</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="equipment_invoice">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 equipment_invoice" name="permissions[]" type="checkbox" value="145" id="permissions[]">
        <span class="">generate equipment invoice</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">equipment_fee</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="equipment_fee">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 equipment_fee" name="permissions[]" type="checkbox" value="146" id="permissions[]">
        <span class="">approve or decline equipment fee</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">service_hod_marine</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="service_hod_marine">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 service_hod_marine" name="permissions[]" type="checkbox" value="148" id="permissions[]">
        <span class="">approve service application as hod marine</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">ticket</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="ticket">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 ticket" name="permissions[]" type="checkbox" value="149" id="permissions[]">
        <span class="">read ticket</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 ticket" name="permissions[]" type="checkbox" value="150" id="permissions[]">
        <span class="">create ticket</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 ticket" name="permissions[]" type="checkbox" value="151" id="permissions[]">
        <span class="">update ticket</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 ticket" name="permissions[]" type="checkbox" value="152" id="permissions[]">
        <span class="">delete ticket</span>
    </div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 ticket" name="permissions[]" type="checkbox" value="153" id="permissions[]">
        <span class="">update ticket status</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">assets</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="assets">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 assets" name="permissions[]" type="checkbox" value="155" id="permissions[]">
        <span class="">read assets</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">components</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="components">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 components" name="permissions[]" type="checkbox" value="156" id="permissions[]">
        <span class="">read components</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">maintenances</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="maintenances">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 maintenances" name="permissions[]" type="checkbox" value="157" id="permissions[]">
        <span class="">read maintenances</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">brands</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="brands">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 brands" name="permissions[]" type="checkbox" value="159" id="permissions[]">
        <span class="">read brands</span>
    </div>
            </div> --}}
    {{-- <div class="row">
<h4 class="mb-3 mt-5">suppliers</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="suppliers">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 suppliers" name="permissions[]" type="checkbox" value="160" id="permissions[]">
        <span class="">read suppliers</span>
    </div>
            </div> --}}
    <div class="row">
<h4 class="mb-3 mt-5">view operational task module</h4>
<div class="col-12 mb-3">
{{--     <a href="#" class="check-all-link" data-group="view operational task module">Select All</a> <!-- Add Check All link -->
 --}}</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 view operational task module" name="permissions[]" type="checkbox" value="167" id="permissions[]">
        <span class="">view operational task module</span>
    </div>
            </div>
    <div class="row">
<h4 class="mb-3 mt-5">view my task module</h4>
<div class="col-12 mb-3">
{{--     <a href="#" class="check-all-link" data-group="view my task module">Select All</a> <!-- Add Check All link -->
 --}}</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 view my task module" name="permissions[]" type="checkbox" value="168" id="permissions[]">
        <span class="">view my task module</span>
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
    {{-- <div class="row">
<h4 class="mb-3 mt-5">view overview module</h4>
<div class="col-12 mb-3">
    <a href="#" class="check-all-link" data-group="view overview module">Select All</a> <!-- Add Check All link -->
</div>
                    <div class="col-6 mb-3">
        <input class="form-checkbox h-4 w-4 view overview module" name="permissions[]" type="checkbox" value="172" id="permissions[]">
        <span class="">view overview module</span>
    </div>
            </div> --}}


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

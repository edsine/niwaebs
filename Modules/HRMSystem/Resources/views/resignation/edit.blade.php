{{Form::model($resignation,array('route' => array('resignation.update', $resignation->id), 'method' => 'PUT')) }}
<div class="modal-body">
    {{-- start for ai module--}}
    @php
        $settings = \Modules\Accounting\Models\Utility::settings();
    @endphp
   {{--  @if($settings['ai_chatgpt_enable'] == 'on')
        <div class="text-end">
            <a href="#" data-size="md" class="btn  btn-primary btn-icon btn-sm" data-ajax-popup-over="true" data-url="{{ route('generate',['resignation']) }}"
               data-bs-placement="top" data-title="{{ __('Generate content with AI') }}">
                <i class="fas fa-robot"></i> <span>{{__('Generate with AI')}}</span>
            </a>
        </div>
    @endif --}}
    {{-- end for ai module--}}
    <div class="row">
        @if(!\Auth::user()->hasRole('user'))
            <div class="form-group col-lg-12">
                {{ Form::label('employee_id', __('Employee'),['class'=>'form-label'])}}
                {{ Form::select('employee_id', $employees,null, array('class' => 'form-control select','required'=>'required')) }}
            </div>
        @endif
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('notice_date',__('Notice Date'),['class'=>'form-label'])}}
            {{Form::date('notice_date',null,array('class'=>'form-control '))}}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('resignation_date',__('Resignation Date'),['class'=>'form-label'])}}
            {{Form::date('resignation_date',null,array('class'=>'form-control '))}}
        </div>
        <div class="form-group col-lg-12">
            {{Form::label('description',__('Description'),['class'=>'form-label'])}}
            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))}}
        </div>

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn  btn-primary">
</div>
{{Form::close()}}

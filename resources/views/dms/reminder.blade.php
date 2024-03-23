@extends('layouts.app')
@section('content')
    
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="float-left">Reminder</div>
        <a  href="{{route('reminder.create')}}" class="btn btn-sm btn-success"> <i class="bi bi-plus"></i> Add Reminder</a>
    </div>
    
    <div class="card">
      
<div class="card-body">


    
    <table id="table" class="table datatable">
        <thead>
          <tr>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Frequency</th>
            <th scope="col">Document</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th></th>
            <td></td>
            <td>
              <input type="text" name="subject" class="form-control " placeholder="Subject">
            </td>
            <td> <input type="text"  name="message" class="form-control " placeholder="Message"></td>
            <td>{!! Form::select('frequency',['number'=>'frequency'], null, ['class'=>' form-select form-control select']) !!}</td>
            <td></td>
          </tr>
            <th>1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
          
         
        </tbody>
      </table>
    </div>
</div>
</div>
@endsection
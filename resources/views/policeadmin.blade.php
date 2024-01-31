@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">NO OF STAFF IN THE DEPARTMENT</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                        <div class="d-md-flex">
                            <h2 class="mb-0">2</h2>
                            <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                {{-- <i class="far fa-clock text-muted"></i> --}}
                                {{-- <small class=" ml-1 mb-0">Updated: 9:10am</small> --}}
                            </div>
                        </div>
                        {{-- <small class="text-gray">Raised from 89 orders.</small> --}}
                    </div>
                    {{-- <div class="d-inline-block">
                        <i class="fas fa-chart-pie text-info icon-lg"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Accident Notification</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                        <div class="d-md-flex">
                            <h2 class="mb-0">1</h2>
                            <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                {{-- <i class="far fa-clock text-muted"></i> --}}
                                {{-- <small class="ml-1 mb-0">Updated: 05:42pm</small> --}}
                            </div>
                        </div>
                        {{-- <small class="text-gray">hey, let’s have lunch together</small> --}}
                    </div>
                    {{-- <div class="d-inline-block">
                        <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <div class="ml-3">
                        <h6>Maria</h6>
                        <p class="text-muted">maria@gmail.com</p>
                        <p class="mt-2 text-primary font-weight-bold">Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <div class="ml-3">
                        <h6>Thomas Edison</h6>
                        <p class="text-muted">thomas@gmail.com</p>
                        <p class="mt-2 text-primary font-weight-bold">Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <div class="ml-3">
                        <h6>Edward</h6>
                        <p class="text-muted">edward@gmail.com</p>
                        <p class="mt-2 text-primary font-weight-bold">Tester</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="col-md-6 col-lg-4 grid-margin"> --}}
{{-- <div class="row">
    <div class="col grid-margin">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">SITES VISITED</h6>
          <div class="map-container">
            <div id="map-with-marker" class="google-map"></div>
          </div>
        </div>
      </div>
    </div>
</div> --}}



@endsection

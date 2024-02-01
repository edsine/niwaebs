@extends('layouts.app')
@section('content')
<div class="mx-9 text-center">
    <center><h3 class=" text-uppercase text-center  text-primary-emphasis bold fw-bolder  mb-7">Inland Waterways Police Command</h3></center>
    <div class="row mt-7">
        @include('clokin')
        <button id="showButton" onclick="showCards()">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="12" cy="12" r="10" />
    <line x1="12" y1="8" x2="12" y2="16" />
    <line x1="8" y1="12" x2="16" y2="12" />
</svg>
</button>
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">NUMBER OF VESSELS  ON THE WATER WAY</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">NUMBER OF VENDORS/CLIENTS</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">ACCIDENTAL NOTIFICATIONS</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>


      </div>
    <div class="row mt-7">
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTAL NUMBER OF VESSELS</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTAL NUMBER OF DEFAULTERS</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{0}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>
        <div class="col-sm-4 mb-3  mb-sm-0">
          <div class="card ">
            <div class="card-body">
                 <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <div class="d-flex flex-stack flex-grow-1 card-p">
                    <div class="d-flex flex-column me-2">
                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">TOTAL NUMBER  DEPARTMENTl STAFF</a>
                        <span class="text-muted fw-semibold mt-1">Analytics as at {{ now()->format('Y-m-d H:i:s') }}
 </span>
                    </div>
                    <span class="symbol symbol-50px">
                        <span class="symbol-label fs-5 fw-bold bg-light-success text-success">{{20}}</span>
                    </span>
                </div>
                <div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 50px"></div>

            </div>
            <!--end::Body-->
            </div>
          </div>
        </div>


      </div>

      <div class="row mt-6">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">STATISTICS OF APPROVED VENDORS </h4>
                <canvas id="pieChart"></canvas>
              </div>
            </div>
        </div>

            <div class="col-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">PERFORMANCE OF SUCCESSFUL DREDGING</h4>
                    <canvas id="areaChart"></canvas>
                  </div>
                </div>
            </div>

      </div>


  </div>

@endsection

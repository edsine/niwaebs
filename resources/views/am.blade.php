@extends('layouts.app')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <h1 class="text-center mb-5">AREA MANAGER DASHBOARD</h1>
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 justify-content-end">
                <div class="col-4">
                    <div class="row">
                        <div class="col-3">
                            {!! Form::label('', 'Filter By', ['class'=>'form-label mt-2']) !!}
                        </div>
                        <div class="col-3">
                           {!! Form::select('branch_id', $branch->pluck('branch_name','id'), null, ['class'=>' form-select']) !!}
                        </div>

                        <div class="col-3">
                            <select class="form-select" id="monthSelect">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-select" id="yearSelect">
                                @php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 10; // Adjust as needed
                                    $endYear = $currentYear + 10; // Adjust as needed
                                @endphp
                                @for ($year = $startYear; $year <= $endYear; $year++)
                                    <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                                    <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                        fill="currentColor" />
                                    <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                                    <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">57</div>
                            <div class="fw-bold"><b>Total No OF Application Forms</b></div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                        fill="currentColor" />
                                    <path
                                        d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                        fill="currentColor" />
                                    <path
                                        d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ 0 }}</div>
                            <div class="fw-bold text-gray-100">Total Number Of Registered Services </div>
                        </div>
                        <!--end::Body-->
                    </a>


                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                        fill="currentColor" />
                                    <path
                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->

                            <div class="text-white fw-bolder fs-2 mb-2 mt-5"> 30,000,000,000 </div>
                            <div class="fw-bold text-white">Total Revenue Generated</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                        fill="currentColor" />
                                    <path
                                        d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                        fill="currentColor" />
                                    <path
                                        d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">200</div>
                            <div class="fw-bold text-gray-100">Total Certificate Issued</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>

            </div>
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                                    <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                        fill="currentColor" />
                                    <rect x="18" y="11" width="3" height="8" rx="1.5"
                                        fill="currentColor" />
                                    <rect x="3" y="13" width="3" height="6" rx="1.5"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">57</div>
                            <div class="fw-bold"><b>Total Permits And Licences</b></div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                        fill="currentColor" />
                                    <path
                                        d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                        fill="currentColor" />
                                    <path
                                        d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ 0 }}</div>
                            <div class="fw-bold text-gray-100">Total Number Of Towed Vessels </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                        fill="currentColor" />
                                    <path
                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->

                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ 0 }}</div>
                            <div class="fw-bold text-white">Registered Vessels</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                        d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                        fill="currentColor" />
                                    <path
                                        d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                        fill="currentColor" />
                                    <path
                                        d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">20</div>
                            <div class="fw-bold text-gray-100">Total No of Staff In The Authority</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>

            </div>
            <br>
            <br>



            <!--begin::Row-->
            <div class="row g-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xxl-6 mb-md-5 mb-xl-10">
                    <div class="row g-5 g-xl-10">
                        <div class="col-md-6 col-xl-6 mb-xxl-10">
                            <!--begin::Card widget 8-->
                            <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                    <!--begin::Statistics-->
                                    <div class="mb-4 px-9">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Currency-->
                                            <span class="fs-4 fw-bold text-gray-400 align-self-start me-1&gt;"></span>
                                            <!--end::Currency-->
                                            <!--begin::Value-->

                                            <span
                                                class="fs-2hx fw-bolder text-gray-800 me-2 lh-1">{{ 3 }}</span>
                                            <!--end::Value-->
                                            <!--begin::Label-->

                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Description-->
                                        <span class="fs-6 fw-bold text-gray-400">Total Number of Pending Inspection</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    {{-- <div id="kt_card_widget_8_chart" class="min-h-auto" style="height: 125px"></div> --}}
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 8-->
                            <!--begin::Card widget 5-->
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span
                                                class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ 0 }}</span>
                                            <!--end::Amount-->
                                            <!--begin::Badge-->

                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-bold fs-6">
                                            Total Number Of Clients Registered</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">


                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 5-->
                        </div>
                        <div class="col-md-6 col-xl-6 mb-xxl-10">
                            <!--begin::Card widget 9-->
                            <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                <!--begin::Card body-->
                                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                    <!--begin::Statistics-->
                                    <div class="mb-4 px-9">
                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Value-->
                                            <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1">0</span>
                                            <!--end::Value-->
                                            <!--begin::Label-->

                                            <!--end::Label-->
                                        </div>
                                        <!--end::Statistics-->
                                        <!--begin::Description-->
                                        <span class="fs-6 fw-bold text-gray-400 text-uppercase">
                                            Total No of Completed Inspection</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Chart-->
                                    <!--end::Chart-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 9-->
                            <!--begin::Card widget 7-->
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">

                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ 0 }}</span>
                                        <!--end::Amount-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-bold fs-6">
                                            Total No Of Leave Applied For</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->

                            </div>
                            <!--end::Card widget 7-->
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-0">
                    <!--begin::Chart widget 15-->
                    {{-- <div class="card  h-xl-100"> --}}
                    <div class="card  h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Area Offices Performance</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <div class="form-group">

                                    {{-- {!! Form::date('date', now()->format('Y-m-d'), ['class' => 'date form-control']) !!} --}}

                                    <form id="branchForm" class="form" method="GET"
                                        action="{{ route('showarea') }}">
                                        @csrf
                                        {!! Form::select('branch_id', $branch->pluck('branch_name', 'id'), null, [
                                            'class' => 'form-control form-select',
                                            'id' => 'branchSelect',
                                        ]) !!}
                                        {{-- <input type="hidden" name="branch_id" id="selectedBranchId"> --}}
                                        <button type="submit" class="btn btn-success">View Details</button>
                                    </form>

                                </div>
                                <!--begin::Menu-->

                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0 ">
                            <!--begin::Chart container-->
                            {{-- <div id="md_chat" class="min-h-auto ps-4 pe-6 mb-3 h-350px"></div> --}}
                            <!--end::Chart container-->

                            <canvas id="md"
                                style="max-width: 100%; height: auto; margin:1em; padding:2em"></canvas>
                            {{-- <canvas id="doughnutChart"></canvas> --}}
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 15-->

                </div>

                <!-- Modal -->
                <div class="modal fade" id="thestate" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="thestate" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fs-5" id="staticBackdropLabel">AREA OFFICES</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">LAGOS</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 row align-items-center">
                                    <div class="col-auto">
                                        <a href="#" class="menu-link px-3">PORT HARCOURT</a>
                                    </div>
                                    <div class="col">
                                        <span>20</span>
                                    </div>
                                </div>

                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">WARRI</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">ONITSHA</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">YENAGOA</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">EKET</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">ABEOKUTA</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">LOKOJA</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">CALABAR</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">KADUNA</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">JALINGO</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">HADEJIA</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">MINNA</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">SOKOTO</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">ABUJA</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">MAIDUGURI</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">YOLA</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">OGUTA</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">IGBOKODA</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">ONITSHA</a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">YALEWA/YAURI</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">BARO PORT</a>
                                </div>
                                <!--end::Menu item-->
                                <!-- Add all 36 states here -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const myChart = document.getElementById('md');

                    const data = {
                        labels: ['Actual', 'Target'],
                        datasets: [{
                            label: 'Performances',
                            data: [300, 50],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                // 'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                        }]
                    };

                    const config = {
                        type: 'doughnut',
                        data: data,
                    };

                    new Chart(myChart, config);


                    // document.getElementById('branchForm').addEventListener('submit', function(event) {
                    //     event.preventDefault();

                    //     // Get the selected branch ID
                    //     var selectedBranchId = document.getElementById('branchSelect').value;

                    //     // Construct the URL with the selected branch ID
                    //     var url = '{{ route('showarea', ':branchId') }}';
                    //     // url = url.replace(':branchId', selectedBranchId);

                    //     // Redirect the user to the constructed URL
                    //     window.location.href = url;

                    // document.getElementById('branchForm').addEventListener('submit', function(event) {
                    //     // Get the selected branch ID
                    //     var selectedBranchId = document.getElementById('branchSelect').value;

                    //     // Set the selected branch ID to the hidden input field
                    //     document.getElementById('selectedBranchId').value = selectedBranchId;
                    // });
                </script>
            @endsection

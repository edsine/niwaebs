@extends('layouts.app')

@section('content')
<h1 class="text-black-50 pt-5">Investment & Treasury Management:<b style="color: #000"> Overview</b></h1>
<br>


<div class="row g-5 g-xl-8 pt-5">
@include('clokin')
	<div class="col-xl-4">
	<button id="showButton" onclick="showCards()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10" />
        <line x1="12" y1="8" x2="12" y2="16" />
        <line x1="8" y1="12" x2="16" y2="12" />
    </svg>
</button>
		<!--begin::Statistics Widget 5-->
		<a href="#" class="card shadow bg-body hoverable card-xl-stretch mb-xl-8">
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
				<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor"></rect>
						<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor"></rect>
						<rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor"></rect>
						<rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor"></rect>
					</svg>
				</span>
				<!--end::Svg Icon-->
				<div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">26085</div>
				<div class="fw-semibold text-gray-400">Total Issued Reciept</div>
			</div>
			<!--end::Body-->
		</a>
		<!--end::Statistics Widget 5-->
	</div>
	<div class="col-xl-4">
		<!--begin::Statistics Widget 5-->
		<a href="#" class="card shadow bg-dark hoverable card-xl-stretch mb-xl-8">
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
				<span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"></path>
						<path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"></path>
						<path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"></path>
					</svg>
				</span>
				<!--end::Svg Icon-->
				<div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">0</div>
				<div class="fw-semibold text-gray-100">Total ECS Reconciliation</div>
			</div>
			<!--end::Body-->
		</a>
		<!--end::Statistics Widget 5-->
	</div>
	<div class="col-xl-4">
		<!--begin::Statistics Widget 5-->
		<a href="#" class="card shadow bg-warning hoverable card-xl-stretch mb-xl-8">
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
				<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor"></path>
						<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor"></path>
					</svg>
				</span>
				<!--end::Svg Icon-->
				<div class="text-white fw-bold fs-2 mb-2 mt-5">0</div>
				<div class="fw-semibold text-white">Total Verified Certificate</div>
			</div>
			<!--end::Body-->
		</a>
		<!--end::Statistics Widget 5-->
	</div>
</div>

<div class="row g-5 g-xl-8">
	<div class="col-xl-6">
		<!--begin::Charts Widget 5-->
		<div class="card card-xl-stretch mb-xl-8">
			<!--begin::Header-->
			<div class="card-header border-0 pt-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bold fs-3 mb-1">ECS Payment Analysis</span>
					<!-- <span class="text-muted fw-semibold fs-7">More than 500 new customers</span> -->
				</h3>
				<!--begin::Toolbar-->
				<div class="card-toolbar" data-kt-buttons="true" data-kt-initialized="1">
					<a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 me-1" id="kt_charts_widget_5_year_btn">Year</a>
					<a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 me-1" id="kt_charts_widget_5_month_btn">Month</a>
					<!-- <a class="btn btn-sm btn-color-muted btn-active btn-active-secondary px-4 active" id="kt_charts_widget_5_week_btn">Week</a> -->
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Chart-->
				<div id="kt_charts_widget_3_chart" style="height: 350px"></div>
				<!--end::Chart-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 5-->
	</div>
	<div class="col-xl-6">
		<!--begin::Charts Widget 5-->
		<div class="card card-xl-stretch mb-5 mb-xl-8">
			<!--begin::Header-->
			<div class="card-header border-0 pt-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bold fs-3 mb-1">Top Branch Perfomance Analysis</span>
					<!-- <span class="text-muted fw-semibold fs-7">More than 500+ new orders</span> -->
				</h3>
				<!--begin::Toolbar-->
				<div class="card-toolbar" data-kt-buttons="true" data-kt-initialized="1">
					<a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="kt_charts_widget_5_year_btn">Year</a>
					<a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="kt_charts_widget_5_month_btn">Month</a>
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Chart-->
				<div id="kt_charts_widget_6_chart" style="height: 350px"></div>
				<!--end::Chart-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 5-->
	</div>
</div>


<!--begin::Tables Widget 12-->
<div class="card mb-5 mb-xl-8">
	<!--begin::Header-->
	<div class="card-header border-0 pt-5">
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold fs-3 mb-1"> ECS Payments (Pending/Approved)</span>
			<!-- <span class="text-muted mt-1 fw-semibold fs-7">Over 500 new members</span> -->
		</h3>
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body py-3">
		<!-- Tabs content -->
		<div class="tab-content" id="ex2-content">
			<div class="tab-pane fade show active" id="ex2-tabs-1" role="tabpanel" aria-labelledby="ex2-tab-1">
				<!--begin::Table container-->
				<div class="table-responsive">
					<!--begin::Table-->
					<table class="table align-middle gs-0 gy-4">
						<!--begin::Table head-->
						<thead>
							<tr class="fw-bold text-muted bg-light">
								<th class="ps-4 min-w-200px rounded-start">ECS Number</th>
								<th class="min-w-200px">Company Name</th>
								<th class="min-w-200px">Company Email</th>
								<th class="min-w-200px">Business Area</th>
								<th class="min-w-200px text-end rounded-end">ACTIONS</th>
							</tr>
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody>
							@foreach ($data as $item)
							<tr>
								<td>
									{{ $item->ecs_number }}
								</td>
								<td>
									{{ $item->company_name }}
								</td>
								<td>
									{{ $item->company_email }}
								</td>
								<td>
									{{ $item->business_area }}
								</td>
								<td class="text-end">
									<a href="{{ route('employers.show', [$item->id]) }}" class='btn btn-default btn-xs'>
										<i class="far fa-eye"></i>
									</a>
									<a href="{{ route('employer.employees', [$item->id]) }}" class='btn btn-default btn-xs'>
										<i class="far fa-user"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
						<!--end::Table body-->
					</table>
					<div class="card-footer clearfix">
						<div class="float-right">
							@include('adminlte-templates::common.paginate', [
							'records' => $data,
							])
						</div>
					</div>
					<!--end::Table-->
				</div>
			</div>
			<!--begin::Body-->
		</div>
		<!--end::Tables Widget 12-->
	</div>
</div>
@endsection

@push('page_scripts')
<script>
	$(document).ready(function() {
		$($('.apexcharts-canvas')[3]).remove();
		$($('.apexcharts-canvas')[1]).remove();
	})
</script>

@endpush
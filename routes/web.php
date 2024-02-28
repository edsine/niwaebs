<?php

use App\Models\User;
use App\Http\Controllers\Minister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
//use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\SetSalaryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ESSPPaymentController;
use App\Http\Controllers\ZoomMeetingController;
use App\Http\Controllers\EmployerDocumentController;
use Modules\Accounting\Http\Controllers\ReportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'clockIn'])->name('home');
    Route::post('/home/clock-in', [HomeController::class, 'clockIn'])->name('clock-in');
    Route::post('/home/clock-out', [HomeController::class, 'clockOut'])->name('clock-out');
    Route::get('/document/index', 'App\Http\Controllers\EmployerDocumentController@index')->name('document.index');
    Route::patch('/approve-document/{id}', [EmployerDocumentController::class, 'approveDocument'])
        ->name('approveDocument');
    Route::get('/inspection-notice/{id}', [EmployerDocumentController::class, 'inspectionNotice'])
        ->name('inspection.notice');
    Route::post('/inspection-send', [EmployerDocumentController::class, 'sendInspectionNotice'])
        ->name('inspection.send');
});

// Start of asset manager

Route::middleware(['auth'])->group(function () {
Route::get('/asset/home','App\Http\Controllers\Home@index');
Route::get('/brandlist','App\Http\Controllers\Brand@index');
Route::get('/departmentlist','App\Http\Controllers\Department@index');
Route::get('/assettypelist','App\Http\Controllers\AssetType@index');
Route::get('/locationlist','App\Http\Controllers\Location@index');
Route::get('/employeeslist','App\Http\Controllers\Employees@index');
Route::get('/supplierlist','App\Http\Controllers\Supplier@index');
Route::get('/userlist','App\Http\Controllers\User@index');
Route::get('/settinglist','App\Http\Controllers\Settings@index');
Route::get('/assetlist','App\Http\Controllers\Asset@index');
Route::get('/assetlist/detail/{id}','App\Http\Controllers\Asset@detail');
Route::get('/assetlist/generatelabel/{id}','App\Http\Controllers\Asset@generatelabel');
Route::get('/componentlist','App\Http\Controllers\Component@index');
Route::get('/componentlist/detail/{componentid}','App\Http\Controllers\Component@detail');
Route::get('/maintenancelist','App\Http\Controllers\Maintenance@index');


//report
Route::get('/reports/assetactivity','App\Http\Controllers\Reports@assetactivity');
Route::get('/reports/componentactivity','App\Http\Controllers\Reports@componentactivity');
Route::get('/reports/maintenance','App\Http\Controllers\Reports@maintenance');
Route::get('/reports/bytype','App\Http\Controllers\Reports@bytype');
Route::get('/reports/bystatus','App\Http\Controllers\Reports@bystatus');
Route::get('/reports/bylocation','App\Http\Controllers\Reports@bylocation');
Route::get('/reports/bysupplier','App\Http\Controllers\Reports@bysupplier');
Route::get('/reports/allreports','App\Http\Controllers\Reports@allreports');

//Home API
Route::get('home/totalbalance','App\Http\Controllers\Home@totalbalance');
Route::get('home/assetbytype','App\Http\Controllers\Home@assetbytype');
Route::get('home/assetbystatus','App\Http\Controllers\Home@assetbystatus');
Route::get('home/recentassetactivity','App\Http\Controllers\Home@recentassetactivity');
Route::get('home/recentcomponentactivity','App\Http\Controllers\Home@recentcomponentactivity');

//Brand API
Route::get('brand','App\Http\Controllers\Brand@getdata');
Route::get('listbrand','App\Http\Controllers\Brand@getrows');
Route::post('savebrand','App\Http\Controllers\Brand@save');
Route::post('updatebrand','App\Http\Controllers\Brand@update');
Route::post('deletebrand','App\Http\Controllers\Brand@delete');
Route::post('brandbyid','App\Http\Controllers\Brand@byid');

//Department API
/* Route::get('department','App\Http\Controllers\Department@getdata');
Route::get('listdepartment','App\Http\Controllers\Department@getrows');
Route::post('savedepartment','App\Http\Controllers\Department@save');
Route::post('updatedepartment','App\Http\Controllers\Department@update');
Route::post('deletedepartment','App\Http\Controllers\Department@delete');
Route::post('departmentbyid','App\Http\Controllers\Department@byid'); */

//Asset Type API
Route::get('assettype','App\Http\Controllers\AssetType@getdata');
Route::get('listassettype','App\Http\Controllers\AssetType@getrows');
Route::post('saveassettype','App\Http\Controllers\AssetType@save');
Route::post('updateassettype','App\Http\Controllers\AssetType@update');
Route::post('deleteassettype','App\Http\Controllers\AssetType@delete');
Route::post('assettypebyid','App\Http\Controllers\AssetType@byid');

//Location API
Route::get('location','App\Http\Controllers\Location@getdata');
Route::get('listlocation','App\Http\Controllers\Location@getrows');
Route::post('savelocation','App\Http\Controllers\Location@save');
Route::post('updatelocation','App\Http\Controllers\Location@update');
Route::post('deletelocation','App\Http\Controllers\Location@delete');
Route::post('locationbyid','App\Http\Controllers\Location@byid');

//Employees API
Route::get('listemployees','App\Http\Controllers\UserController@getrows');
/* Route::get('employees','App\Http\Controllers\Employees@getdata');
Route::get('listemployees','App\Http\Controllers\Employees@getrows');
Route::post('saveemployees','App\Http\Controllers\Employees@save');
Route::post('updateemployees','App\Http\Controllers\Employees@update');
Route::post('deleteemployees','App\Http\Controllers\Employees@delete');
Route::post('employeesbyid','App\Http\Controllers\Employees@byid'); */

//Supplier API
Route::get('supplier','App\Http\Controllers\Supplier@getdata');
Route::get('listsupplier','App\Http\Controllers\Supplier@getrows');
Route::post('savesupplier','App\Http\Controllers\Supplier@save');
Route::post('updatesupplier','App\Http\Controllers\Supplier@update');
Route::post('deletesupplier','App\Http\Controllers\Supplier@delete');
Route::post('supplierbyid','App\Http\Controllers\Supplier@byid');

//User API
/* Route::get('user','App\Http\Controllers\User@getdata');
Route::get('listuser','App\Http\Controllers\User@getrows');
Route::post('saveuser','App\Http\Controllers\User@save');
Route::post('updateuser','App\Http\Controllers\User@update');
Route::post('deleteuser','App\Http\Controllers\User@delete');
Route::post('userbyid','App\Http\Controllers\User@byid'); */

//Settings API
/* Route::get('settings','App\Http\Controllers\Settings@getdata');
Route::post('updatesettings','App\Http\Controllers\Settings@update');
 */
//Asset API
Route::get('asset/data','App\Http\Controllers\Asset@getdata');
Route::get('listasset','App\Http\Controllers\Asset@getrows');
Route::post('saveasset','App\Http\Controllers\Asset@save');
Route::post('updateasset','App\Http\Controllers\Asset@update');
Route::post('deleteasset','App\Http\Controllers\Asset@delete');
Route::post('assetbyid','App\Http\Controllers\Asset@byid');
Route::post('savecheckout','App\Http\Controllers\Asset@savecheckout');
Route::post('savecheckin','App\Http\Controllers\Asset@savecheckin');
Route::post('historyassetbyid','App\Http\Controllers\Asset@historyassetbyid');
Route::get('asset/generateproductcode','App\Http\Controllers\Asset@generateproductcode');


//Component API
Route::get('component','App\Http\Controllers\Component@getdata');
Route::get('listcomponent','App\Http\Controllers\Component@getrows');
Route::post('savecomponent','App\Http\Controllers\Component@save');
Route::post('updatecomponent','App\Http\Controllers\Component@update');
Route::post('deletecomponent','App\Http\Controllers\Component@delete');
Route::post('savecheckoutcomponent','App\Http\Controllers\Component@savecheckout');
Route::post('savecheckincomponent','App\Http\Controllers\Component@savecheckin');
Route::post('componentbyid','App\Http\Controllers\Component@byid');
Route::post('singlehistorycomponentbyid','App\Http\Controllers\Component@singlehistorycomponentbyid');
Route::get('component/generateproductcode','App\Http\Controllers\Component@generateproductcode');
Route::post('componentassetbyid','App\Http\Controllers\Component@assetsbyid');
Route::post('historycomponentbyid','App\Http\Controllers\Component@historycomponentbyid');

//Maintenance API
Route::get('maintenance','App\Http\Controllers\Maintenance@getdata');
Route::get('listmaintenance','App\Http\Controllers\Maintenance@getrows');
Route::post('savemaintenance','App\Http\Controllers\Maintenance@save');
Route::post('updatemaintenance','App\Http\Controllers\Maintenance@update');
Route::post('deletemaintenance','App\Http\Controllers\Maintenance@delete');
Route::post('maintenancebyid','App\Http\Controllers\Maintenance@byid');
Route::post('maintenanceassetsbyid','App\Http\Controllers\Maintenance@assetsbyid');


//Report API
Route::get('listassetactivityreport','App\Http\Controllers\Reports@getassetactivityreport');
Route::get('listcomponentactivityreport','App\Http\Controllers\Reports@getcomponentactivityreport');
Route::get('getdatabytypereport','App\Http\Controllers\Reports@getdatabytypereport');
Route::get('getdatabystatusreport','App\Http\Controllers\Reports@getdatabystatusreport');
Route::get('getdatabysupplierreport','App\Http\Controllers\Reports@getdatabysupplierreport');
Route::get('getdatabylocationreport','App\Http\Controllers\Reports@getdatabylocationreport');
});
// End asset manager



Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')
    ->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')
    ->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')
    ->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')
    ->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')
    ->name('io_generator_builder_rollback');
Route::post('generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile')
    ->name('io_generator_builder_generate_from_file');

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/html_email', [UserController::class, 'html_email'])->name('html_email');

//Route::get('/webmail', [EmailController::class, 'index']);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/financeadmin', [HomeController::class, 'financeadmin'])->name('financeadmin');
    Route::get('/claimsadmin', [HomeController::class, 'claimsadmin'])->name('claimsadmin');
    Route::resource('services', App\Http\Controllers\ServiceController::class);
    Route::resource('sub-services', App\Http\Controllers\SubServiceController::class);
});

// Route::middleware(['auth', 'authuserbyrole'])->group(function(){
//     Route::get('/home', [HomeController::class, 'index'])->name('home');

// });
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/niwa/payments', [ESSPPaymentController::class, 'index'])->name('niwa.payments');
    Route::patch('/approve-payment/{id}', [ESSPPaymentController::class, 'approvePayment'])
        ->name('approvePayment');
    Route::patch('/reject-payment/{id}', [ESSPPaymentController::class, 'rejectPayment'])
        ->name('rejectPayment');
});



Route::get('/roundcube-login', [HomeController::class, 'roundcubeLogin']);

Route::get('auditadmin', [HomeController::class, 'auditadmin']);
Route::get('ictadmin', [HomeController::class, 'ictadmin'])->name('ict');
// Route::get('/hradmin', [HomeController::class, 'hradmin'])->name('hradmin');
Route::get('/financeadmin', [HomeController::class, 'financeadmin'])->name('financeadmin');
Route::get('/claimsadmin', [HomeController::class, 'claimsadmin'])->name('claimsadmin');
Route::get('/itmadmin', [HomeController::class, 'itmadmin'])->name('itmadmin');
Route::get('/complianceadmin', [HomeController::class, 'complianceadmin'])->name('complianceadmin');
Route::get('/hseadmin', [HomeController::class, 'hseadmin'])->name('hseadmin');
Route::get('/permsec', [HomeController::class, 'pamsec'])->name('permsec');
Route::get('/am', [HomeController::class, 'branch'])->name('am');
Route::get('/region', [HomeController::class, 'regional'])->name('region');
Route::get('/ed_md', [HomeController::class, 'edfinance'])->name('ed_md');
Route::get('/ed_admin', [HomeController::class, 'edadmin'])->name('ed_admin');

Route::get('/riskadmin', [HomeController::class, 'riskadmin']);

Route::get('/aprd', [HomeController::class, 'aprd']);
Route::get('/fre', [HomeController::class, 'fre']);
Route::get('/copaffairs', [HomeController::class, 'copaffairs']);
Route::get('legaladmin', [HomeController::class, 'legaladmin']);
Route::get('procurementadmin', [HomeController::class, 'procurementadmin']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/view-profile', [ProfileController::class, 'showProfile'])->name('view-profile');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile-update');


//Route::resource('users', UserController::class)->middleware('auth');
//Route::resource('roles', RoleController::class)->middleware('auth');
Route::post('api/fetch-locals', [DropdownController::class, 'fetchLocal']);


// Demo Mail UI Route
Route::get('/composemail', [HomeController::class, 'composeMail'])->name('compose_mail');
Route::get('/mailinbox', [HomeController::class, 'mailInbox'])->name('mail_inbox');
Route::get('/viewreplymail', [HomeController::class, 'viewReplyMail'])->name('view_reply_mail');


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('myedit/{id}', [UserController::class, 'myedit'])->name('myedit');
    Route::put('myedit/{id}', [UserController::class, 'myupdate'])->name('myupdate');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/minister', [HomeController::class, 'minister'])->name('minister');

    Route::get('users/{id}', 'UserController@show')->name('users.show');
    Route::get('certicate', [CertificateController::class, 'index'])->name('certicate');

    Route::get('/active', [UserController::class, 'getactive'])->name('active');
    Route::get('/pending', [UserController::class, 'getpending'])->name('pending');
    Route::post('/upload', [UserController::class, 'upload'])->name('upload');
    Route::get('/bulkUpload', [UserController::class, 'bulkUpload'])->name('bulkUpload');
    Route::get('change-email-password', [UserController::class, 'showChangePasswordForm'])->name('change.email.password.form');
    Route::post('change-email-password', [UserController::class, 'changePassword'])->name('change.email.password');
    Route::post('/save-signature', [UserController::class, 'saveSignature']);
    Route::get('/change-signature', [UserController::class, 'changeSignature'])->name('change.signature');
});

// Route::get('/account', function () {
//     return view('accountdashboard');
// });
// Route::view('/md','md');
// Route::view('am','am');

Route::get('md_user',[HomeController::class,'md'])->name('md');
Route::get('areamanager',[HomeController::class,'areamanager'])->name('am');
//=================================== Zoom Meeting ======================================================================
Route::get('zoom', function () {
    return view('zoom-meeting.index');
})->name('zoom');
// // Route::resource('zoom-meeting', ZoomMeetingController::class)->middleware(['auth']);
// Route::any('/zoom-meeting/projects/select/{bid}', [ZoomMeetingController::class, 'projectwiseuser'])->name('zoom-meeting.projects.select');
// Route::get('zoom-meeting-calender', [ZoomMeetingController::class, 'calender'])->name('zoom-meeting.calender')->middleware(['auth','XSS']);

//=================================== Zoom Meeting ======================================================================
Route::resource('zoom-meeting', ZoomMeetingController::class)->middleware(['auth']);
Route::any('/zoom-meeting/projects/select/{bid}', [ZoomMeetingController::class, 'projectwiseuser'])->name('zoom-meeting.projects.select');
Route::get('zoom-meeting-calender', [ZoomMeetingController::class, 'calender'])->name('zoom-meeting.calender')->middleware(['auth']);




Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ],
    function () {
        Route::get('support/{id}/reply', [SupportController::class, 'reply'])->name('support.reply');
        Route::post('support/{id}/reply', [SupportController::class, 'replyAnswer'])->name('support.reply.answer');
        Route::get('support/grid', [SupportController::class, 'grid'])->name('support.grid');
        Route::resource('support', SupportController::class);
    }
);

Route::resource('setsalary', SetSalaryController::class)->middleware(['auth']);
Route::get('employee/salary/{eid}', [SetSalaryController::class, 'employeeBasicSalary'])->name('employee.basic.salary')->middleware(['auth']);
Route::post('employee/update/sallary/{id}', [SetSalaryController::class, 'employeeUpdateSalary'])->name('employee.salary.update')->middleware(['auth']);
Route::get('salary/employeeSalary', [SetSalaryController::class, 'employeeSalary'])->name('employeesalary')->middleware(['auth']);
Route::post('branch/employee/json', [UserController::class, 'employeeJson'])->name('branch.employee.json')->middleware(['auth']);

Route::resource('allowance', AllowanceController::class)->middleware(['auth']);
Route::get('allowances/create/{eid}', [AllowanceController::class, 'allowanceCreate'])->name('allowances.create')->middleware(['auth']);


Route::post('newuserstore', [UserController::class, 'store'])->name('newuser')->middleware(['auth']);
// Route::post('newuserstore',[UserController::class,'store'])->name('newuser')->middleware(['auth']);
//payslip

/* Route::resource('paysliptype', PayslipTypeController::class)->middleware(['auth']);
Route::resource('commission', CommissionController::class)->middleware(['auth']);
Route::resource('allowanceoption', AllowanceOptionController::class)->middleware(['auth']);
Route::resource('loanoption', LoanOptionController::class)->middleware(['auth']);
Route::resource('deductionoption', DeductionOptionController::class)->middleware(['auth']);
Route::resource('loan', LoanController::class)->middleware(['auth']);
Route::resource('saturationdeduction', SaturationDeductionController::class)->middleware(['auth']);
Route::resource('otherpayment', OtherPaymentController::class)->middleware(['auth']);
Route::resource('overtime', OvertimeController::class)->middleware(['auth']);


Route::get('commissions/create/{eid}', [CommissionController::class, 'commissionCreate'])->name('commissions.create')->middleware(['auth']);
Route::get('loans/create/{eid}', [LoanController::class, 'loanCreate'])->name('loans.create')->middleware(['auth']);
Route::get('saturationdeductions/create/{eid}', [SaturationDeductionController::class, 'saturationdeductionCreate'])->name('saturationdeductions.create')->middleware(['auth']);
Route::get('otherpayments/create/{eid}', [OtherPaymentController::class, 'otherpaymentCreate'])->name('otherpayments.create')->middleware(['auth']);
Route::get('overtimes/create/{eid}', [OvertimeController::class, 'overtimeCreate'])->name('overtimes.create')->middleware(['auth']);
Route::get('payslip/paysalary/{id}/{date}', [PaySlipController::class, 'paysalary'])->name('payslip.paysalary')->middleware(['auth']);
Route::get('payslip/bulk_pay_create/{date}', [PaySlipController::class, 'bulk_pay_create'])->name('payslip.bulk_pay_create')->middleware(['auth']);
Route::post('payslip/bulkpayment/{date}', [PaySlipController::class, 'bulkpayment'])->name('payslip.bulkpayment')->middleware(['auth']);
Route::post('payslip/search_json', [PaySlipController::class, 'search_json'])->name('payslip.search_json')->middleware(['auth']);
Route::get('payslip/employeepayslip', [PaySlipController::class, 'employeepayslip'])->name('payslip.employeepayslip')->middleware(['auth']);
Route::get('payslip/showemployee/{id}', [PaySlipController::class, 'showemployee'])->name('payslip.showemployee')->middleware(['auth']);
Route::get('payslip/editemployee/{id}', [PaySlipController::class, 'editemployee'])->name('payslip.editemployee')->middleware(['auth']);
Route::post('payslip/editemployee/{id}', [PaySlipController::class, 'updateEmployee'])->name('payslip.updateemployee')->middleware(['auth']);
Route::get('payslip/pdf/{id}/{m}', [PaySlipController::class, 'pdf'])->name('payslip.pdf')->middleware(['auth']);
Route::get('payslip/payslipPdf/{id}', [PaySlipController::class, 'payslipPdf'])->name('payslip.payslipPdf')->middleware(['auth']);
Route::get('payslip/send/{id}/{m}', [PaySlipController::class, 'send'])->name('payslip.send')->middleware(['auth']);
Route::get('payslip/delete/{id}', [PaySlipController::class, 'destroy'])->name('payslip.delete')->middleware(['auth']);
Route::resource('payslip', PaySlipController::class)->middleware(['auth']); */

Route::get('report/income-summary', [ReportController::class, 'incomeSummary'])->name('report.income.summary');
Route::get('report/expense-summary', [ReportController::class, 'expenseSummary'])->name('report.expense.summary');
Route::get('report/income-vs-expense-summary', [ReportController::class, 'incomeVsExpenseSummary'])->name('report.income.vs.expense.summary');
Route::get('report/tax-summary', [ReportController::class, 'taxSummary'])->name('report.tax.summary');
//    Route::get('report/profit-loss-summary', [ReportController::class, 'profitLossSummary'])->name('report.profit.loss.summary');
Route::get('report/invoice-summary', [ReportController::class, 'invoiceSummary'])->name('report.invoice.summary');
Route::get('report/bill-summary', [ReportController::class, 'billSummary'])->name('report.bill.summary');
Route::get('report/product-stock-report', [ReportController::class, 'productStock'])->name('report.product.stock.report');
Route::get('report/invoice-report', [ReportController::class, 'invoiceReport'])->name('report.invoice');
Route::get('report/account-statement-report', [ReportController::class, 'accountStatement'])->name('report.account.statement');
Route::get('report/balance-sheet', [ReportController::class, 'balanceSheet'])->name('report.balance.sheet');
Route::get('report/ledger', [ReportController::class, 'ledgerSummary'])->name('report.ledger');
Route::get('report/trial-balance', [ReportController::class, 'trialBalanceSummary'])->name('trial.balance');
Route::get('report/profit-loss', [ReportController::class, 'profitLoss'])->name('report.profit.loss');
Route::get('reports-monthly-cashflow', [ReportController::class, 'monthlyCashflow'])->name('report.monthly.cashflow');
Route::get('reports-quarterly-cashflow', [ReportController::class, 'quarterlyCashflow'])->name('report.quarterly.cashflow');
Route::post('export/trial-balance', [ReportController::class, 'trialBalanceExport'])->name('trial.balance.export');
Route::post('export/balance-sheet', [ReportController::class, 'balanceSheetExport'])->name('balance.sheet.export');
Route::post('print/balance-sheet', [ReportController::class, 'balanceSheetPrint'])->name('balance.sheet.print');
Route::post('print/trial-balance', [ReportController::class, 'trialBalancePrint'])->name('trial.balance.print');

// Email Templates
Route::get('email_template_lang/{id}/{lang?}', [EmailTemplateController::class, 'manageEmailLang'])->name('manage.email.language')->middleware(['auth']);
Route::any('email_template_store/{pid}', [EmailTemplateController::class, 'storeEmailLang'])->name('store.email.language')->middleware(['auth']);
Route::any('email_template_store', [EmailTemplateController::class, 'updateStatus'])->name('status.email.language')->middleware(['auth']);
Route::resource('email_template', EmailTemplateController::class)->middleware(['auth']);

// End Email Templates

//Botman side that i do match route
Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotmanController@handle')->name('botman');

Route::resource('equipmentAndFees', App\Http\Controllers\EquipmentAndFeeController::class)->middleware(['auth']);

Route::resource('serviceApplications', App\Http\Controllers\ServiceApplicationController::class);
Route::post('approve-document/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveOrDeclineDocument'])->name('application.approve.document');
Route::post('final-documents-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveDocuments'])->name('application.final.documents.approval');
Route::post('processing-fee-payment-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveProcessingFee'])->name('application.processingfee.approval');
Route::post('inspection-fee-payment-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveInspectionFee'])->name('application.inspectionfee.approval');
Route::post('set-inspection-status/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'setInspectionStatus'])->name('application.inspection.status');
Route::post('application-equipment-invoice/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'generateEquipmentInvoice'])->name('application.equipmemt.invoice');
Route::post('equipment-fee-payment-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'approveEquipmentFee'])->name('application.equipmentfee.approval');
Route::post('area-officer-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'areaOfficerApproval'])->name('application.areaofficer.approval');
Route::post('hod-marine-approval/{id}', [App\Http\Controllers\ServiceApplicationController::class, 'hodMarineApproval'])->name('application.hodmarine.approval');
Route::get('/map/{id}', 'App\Http\Controllers\ServiceApplicationController@showMap')->name('map.show');







Route::group(['middleware' => 'auth'], function() {


    Route::get('createdocument',[DocumentController::class,'ldmsCreate'])->name('document.create');
    Route::get('document/updateprofile',[DocumentController::class,'ldmsUpdateProfile'])->name('document.updateprofile');



    Route::get('language-switch/{locale}', [HomeController::class,'languageSwitch']);

	Route::post('/document/import', [DocumentController::class,'import'])->name('document.import');

	Route::get('/document/ldms_create', [DocumentController::class,'ldmsCreate'])->name('create.document');

	Route::post('/document/ldms_store', [DocumentController::class,'ldmsStore'])->name('documents.stores');
	// Route::get('/document/ldms_edit/{id}', array("uses"=>'DocumentController@ldmsEdit'));
	Route::get('/document/ldms_edit/{id}', [DocumentController::class,'ldmsEdit']);

	Route::post('/document/ldms_edit/ldms_update/{id}', [DocumentController::class,'ldmsUpdate']);
	Route::get('/document/ldms_delete/{id}/{fileName}', [DocumentController::class,'ldmsDelete']);
	Route::get('/document/ldms_alarm_date/{id}', [DocumentController::class,'ldmsAlarmDate']);
	Route::post('/document/ldms_alarm_date/ldms_alarm_add', [DocumentController::class,'ldmsAlarmAdd']);
	Route::get('/document/ldms_alarm_date/ldms_alarm_delete/{alarm}/{id}/{alarmList}', [DocumentController::class,'ldmsAlarmDelete']);
	Route::get('/document/ldms_updateProfile', [DocumentController::class,'ldmsUpdateProfile']);
	Route::post('/document/ldms_manageProfileUpdate', [DocumentController::class,'ldmsManageProfileUpdate']);
	Route::post('/document/ldms_changePassword', [DocumentController::class,'ldmsChangePassword']);
	Route::get('/document/ldms_expired_documents', [DocumentController::class,'ldmsExpiredDocuments'])->name('expireddocument');
	Route::get('/document/ldms_close_to_be_expired_documents', [DocumentController::class,'ldmsCloseToBeExpiredDocuments'])->name('closetobe');
	Route::get('/document/ldms_search', [DocumentController::class,'ldmsSearch']);
	Route::get('/document/ldms_email_send', [DocumentController::class,'ldmsEmailSend']);
	Route::get('general-settings', [HomeController::class,'generalSetting'])->name('setting.general');
	Route::post('general-settingStore', [HomeController::class,'generalSettingStore'])->name('setting.generalStore');
	Route::get('mail-settings', [HomeController::class,'mailSetting'])->name('setting.mail');
	Route::post('mail-settingStore', [HomeController::class,'mailSettingStore'])->name('setting.mailStore');
	Route::get('sms-settings', [HomeController::class,'smsSetting'])->name('setting.sms');
	Route::post('sms-settingStore', [HomeController::class,'smsSettingStore'])->name('setting.smsStore');
});

Route::group(['middleware' => ['auth',]], function(){

	Route::get('/role/ldms_role_search', [RoleController::class,'ldmsRoleSearch']);
	Route::get('/user/ldms_user_search', [UserController::class,'ldmsUserSearch']);
	Route::resource('role',RoleController::class);
	Route::get('/user/password', [UserController::class,'userPass']);
	// Route::get('user/demo','UserController@demo');
	// Route::get('user/demo',[UserController::class,'demo']);
	Route::resource('user',UserController::class);

    // Route::get('user/create',[UserController::class,'create'])->name('user.create');
});

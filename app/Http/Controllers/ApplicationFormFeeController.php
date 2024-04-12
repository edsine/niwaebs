<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationFormFeeRequest;
use App\Http\Requests\UpdateApplicationFormFeeRequest;
use App\Models\ApplicationFormFee;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;

class ApplicationFormFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth()->user()->hasRole('super-admin')){
        $application_form_fees = ApplicationFormFee::all();
    }else{
        $application_form_fees = ApplicationFormFee::where('branch_id', Auth()->user()->staff->branch->id)->get();
    }

        return view('application_form_fee.index', compact('application_form_fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth()->user()->hasRole('super-admin')){
            $branches = Branch::all();
            $services = Service::all();
        }else{
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }
        return view('application_form_fee.create', compact(['services','branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationFormFeeRequest $request)
    {
        $validated = $request->validated();
        $check = ApplicationFormFee::where('amount', $request->input('amount'))->where('branch_id', $request->input('branch_id'))->first();
        if($check){
            return redirect()->route('application_form_fee.create')->with('error', 'Application form fee already exist in this area office!');
        }
        ApplicationFormFee::create($validated);
        return redirect()->route('application_form_fee.index')->with('success', 'Application form fee added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(ApplicationFormFee $application_form_fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplicationFormFee $application_form_fee)
    {
        if(Auth()->user()->hasRole('super-admin')){
            $branches = Branch::all();
            $services = Service::all();
        }else{
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }
        return view('application_form_fee.edit', compact(['application_form_fee', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationFormFeeRequest $request, ApplicationFormFee $application_form_fee)
    {
        $validated = $request->validated();
        $application_form_fee->update($validated);
        return redirect()->route('application_form_fee.index')->with('success', 'Application form fee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationFormFee $application_form_fee)
    {
        if ($application_form_fee->delete())
            return redirect()->back()->with('success', 'Application form fee deleted successfully!');
        return redirect()->back()->with('error', 'Application form fee could not be deleted!');
    }

    
}

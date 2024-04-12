<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProcessingFeeRequest;
use App\Http\Requests\UpdateProcessingFeeRequest;
use App\Models\ProcessingType;
use App\Models\ProcessingFee;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;

class ProcessingFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth()->user()->hasRole('super-admin')){
        $processing_fees = ProcessingFee::all();
    }else{
        $processing_fees = ProcessingFee::where('branch_id', Auth()->user()->staff->branch->id)->get();
    }

        return view('processing_fee.index', compact('processing_fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if(Auth()->user()->hasRole('super-admin')){
            $branches = Branch::all();
            $services = Service::all();
            $processing_types = ProcessingType::all();
        }else{
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
            $processing_types = ProcessingType::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }
        return view('processing_fee.create', compact(['services', 'processing_types', 'branches']));
    }

    public function getProcessingTypes(ProcessingType $processingType, $id)
{
    $processingTypes = $processingType->where('branch_id', $id)->get();
    //$processingTypes = $service->processingTypes()->get();
    return response()->json($processingTypes);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProcessingFeeRequest $request)
    {
        $validated = $request->validated();
        $check = ProcessingFee::where('processing_type_id', $request->input('processing_type_id'))->where('amount', $request->input('amount'))->where('branch_id', $request->input('branch_id'))->first();
        if($check){
            return redirect()->route('processing_fee.create')->with('error', 'Processing fee already exist in this area office and processing type!');
        }
        ProcessingFee::create($validated);
        return redirect()->route('processing_fee.index')->with('success', 'Processing fee added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(ProcessingFee $processing_fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcessingFee $processing_fee)
    {
        if(Auth()->user()->hasRole('super-admin')){
            $branches = Branch::all();
            $services = Service::all();
            $processing_types = ProcessingType::all();
        }else{
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
            $processing_types = ProcessingType::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }
        return view('processing_fee.edit', compact(['processing_fee', 'services', 'processing_types', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProcessingFeeRequest $request, ProcessingFee $processing_fee)
    {
        $validated = $request->validated();
        $processing_fee->update($validated);
        return redirect()->route('processing_fee.index')->with('success', 'Processing fee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcessingFee $processing_fee)
    {
        if ($processing_fee->delete())
            return redirect()->back()->with('success', 'Processing fee deleted successfully!');
        return redirect()->back()->with('error', 'Processing fee could not be deleted!');
    }

    
}

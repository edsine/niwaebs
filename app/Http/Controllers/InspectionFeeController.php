<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInspectionFeeRequest;
use App\Http\Requests\UpdateInspectionFeeRequest;
use App\Models\ProcessingType;
use App\Models\InspectionFee;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;

class InspectionFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth()->user()->hasRole('super-admin')){
        $inspection_fees = InspectionFee::limit(50)->get();
        }else{
        $inspection_fees = InspectionFee::limit(50)->where('branch_id', Auth()->user()->staff->branch->id)->get();
        }

        return view('inspection_fee.index', compact('inspection_fees'));
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
        return view('inspection_fee.create', compact(['services', 'processing_types', 'branches']));
    }

    public function getProcessingTypes(Service $service)
{
    $processingTypes = $service->processingTypes()->get();
    return response()->json($processingTypes);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInspectionFeeRequest $request)
    {
        $validated = $request->validated();
        $check = InspectionFee::where('processing_type_id', $request->input('processing_type_id'))->where('amount', $request->input('amount'))->where('branch_id', $request->input('branch_id'))->first();
        if($check){
            return redirect()->route('inspection_fee.create')->with('error', 'Inspection fee already exist in this area office and processing type!');
        }
        InspectionFee::create($validated);
        return redirect()->route('inspection_fee.index')->with('success', 'Inspection fee added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(InspectionFee $inspection_fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InspectionFee $inspection_fee)
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
        return view('inspection_fee.edit', compact(['inspection_fee', 'services', 'processing_types', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInspectionFeeRequest $request, InspectionFee $inspection_fee)
    {
        $validated = $request->validated();
        $inspection_fee->update($validated);
        return redirect()->route('inspection_fee.index')->with('success', 'Inspection fee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InspectionFee $inspection_fee)
    {
        if ($inspection_fee->delete())
            return redirect()->back()->with('success', 'Inspection fee deleted successfully!');
        return redirect()->back()->with('error', 'Inspection fee could not be deleted!');
    }

    
}

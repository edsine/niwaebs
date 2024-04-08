<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProcessingTypeRequest;
use App\Http\Requests\UpdateProcessingTypeRequest;
use App\Models\ProcessingType;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;

class ProcessingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processing_types = ProcessingType::paginate(10);

        return view('processing_type.index', compact('processing_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        $branches = Branch::all();
        return view('processing_type.create', compact(['services', 'branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProcessingTypeRequest $request)
    {
        $validated = $request->validated();
        ProcessingType::create($validated);
        return redirect()->route('processing_type.index')->with('success', 'Processing type added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(ProcessingType $processing_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcessingType $processing_type)
    {
        $services = Service::all();
        $branches = Branch::all();
        return view('processing_type.edit', compact(['processing_type', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProcessingTypeRequest $request, ProcessingType $processing_type)
    {
        $validated = $request->validated();
        $processing_type->update($validated);
        return redirect()->route('processing_type.index')->with('success', 'Processing type udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcessingType $processing_type)
    {
        if ($processing_type->delete())
            return redirect()->back()->with('success', 'Processing type deleted successfully!');
        return redirect()->back()->with('error', 'Processing type could not be deleted!');
    }

    
}

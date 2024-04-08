<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationFeeRequest;
use App\Http\Requests\UpdateRegistrationFeeRequest;
use App\Models\RegistrationFee;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;

class RegistrationFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registration_fees = RegistrationFee::paginate(10);

        return view('registration_fee.index', compact('registration_fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        $branches = Branch::all();
        return view('registration_fee.create', compact(['services','branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationFeeRequest $request)
    {
        $validated = $request->validated();
        RegistrationFee::create($validated);
        return redirect()->route('registration_fee.index')->with('success', 'Registration fee added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(RegistrationFee $registration_fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrationFee $registration_fee)
    {
        $services = Service::all();
        $branches = Branch::all();
        return view('registration_fee.edit', compact(['registration_fee', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationFeeRequest $request, RegistrationFee $registration_fee)
    {
        $validated = $request->validated();
        $registration_fee->update($validated);
        return redirect()->route('registration_fee.index')->with('success', 'Registration fee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrationFee $registration_fee)
    {
        if ($registration_fee->delete())
            return redirect()->back()->with('success', 'Registration fee deleted successfully!');
        return redirect()->back()->with('error', 'Registration fee could not be deleted!');
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Imports\EmployeesImport;
use App\Models\Service;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Shared\Models\Branch;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service as WebService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth()->user()->hasRole('super-admin')) {
            $services = Service::all();
        } else {
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        if (Auth()->user()->hasRole('super-admin')) {
            $branches = Branch::all();
        } else {
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
        }
        return view('services.create', compact(['states', 'branches']));
    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreServiceRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = 1;
        $check = Service::where('name', $request->input('name'))->where('branch_id', $request->input('branch_id'))->first();
        if ($check) {
            return redirect()->route('services.create')->with('error', 'Service type already exist in this area office!');
        }
        $service = Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service added successfully!');
    }

    public function storebulk(Request $request)
    {

        return redirect()->route('services.index')->with('success', 'Bulk Service added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $states = State::all();
        if (Auth()->user()->hasRole('super-admin')) {
            $branches = Branch::all();
        } else {
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
        }
        return view('services.edit', compact(['service', 'states', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validated = $request->validated();
        $service->update($validated);
        return redirect()->route('services.index')->with('success', 'Service udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->delete())
            return redirect()->back()->with('success', 'Service deleted successfully!');
        return redirect()->back()->with('error', 'Service could not be deleted!');
    }
}

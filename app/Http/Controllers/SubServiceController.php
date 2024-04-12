<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\SubService;
use Modules\Shared\Models\Branch;

class SubServiceController extends Controller
{
    //
    public function index()
    {
        if(Auth()->user()->hasRole('super-admin')){
        $services = SubService::all();
    }else{
        $services = SubService::where('branch_id', Auth()->user()->staff->branch->id)->get();
    }

        return view('sub_services.index', compact('services'));
    }

    public function create()
    {
        
        if(Auth()->user()->hasRole('super-admin')){
        $branches = Branch::all();
        $services = Service::all();
    }else{
        $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
        $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
    }
    return view('sub_services.create', compact('services', 'branches'));
    }

    public function store(Request $request)
{
    $request->validate([
        'service_id' => 'required|exists:services,id',
        'name' => 'required|string|max:255',
        'branch_id' => 'required|exists:branches,id',
    ]);

    $check = SubService::where('name', $request->input('name'))->where('branch_id', $request->input('branch_id'))->first();
    if($check){
        return redirect()->route('sub-services.create')->with('error', 'Sub-Service type already exist in this area office!');
    }

    SubService::create([
        'service_id' => $request->input('service_id'),
        'name' => $request->input('name'),
        'status' => 1,
        'branch_id' => $request->input('branch_id'),
    ]);

    return redirect()->route('sub-services.index')->with('success', 'Sub-Service added successfully.');
}

    public function edit($id)
    {
        $subservices = SubService::findOrFail($id);
        
        if(Auth()->user()->hasRole('super-admin')){
            $branches = Branch::all();
            $services = Service::all();
        }else{
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }
        return view('sub_services.edit', compact(['services', 'subservices', 'branches']));
    }

    public function update(Request $request, SubService $subService)
    {
    $request->validate([
        'service_id' => 'required|exists:services,id',
        'name' => 'required|string|max:255',
        'branch_id' => 'required|exists:branches,id',
    ]);

    $subService = SubService::findOrFail($subService->id);
    $subService->update([
        'service_id' => $request->input('service_id'),
        'name' => $request->input('name'),
        'branch_id' => $request->input('branch_id'),
    ]);

    return redirect()->route('sub-services.index')->with('success', 'Sub-Service updated successfully.');
    }

    public function destroy(SubService $subService)
    {
        if ($subService->delete())
            return redirect()->back()->with('success', 'Sub-Service deleted successfully!');
        return redirect()->back()->with('error', 'Sub-Service could not be deleted!');
    }
}

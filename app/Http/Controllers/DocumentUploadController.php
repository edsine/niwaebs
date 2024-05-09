<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentUploadRequest;
use App\Http\Requests\UpdateDocumentUploadRequest;
use App\Models\DocumentUpload;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;

class DocumentUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth()->user()->hasRole('super-admin')){
        $document_uploads = DocumentUpload::limit(20)->get();
    }else{
        $document_uploads = DocumentUpload::limit(20)->where('branch_id', Auth()->user()->staff->branch->id)->get();
    }

        return view('document_upload.index', compact('document_uploads'));
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
        return view('document_upload.create', compact(['services','branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentUploadRequest $request)
    {
        $validated = $request->validated();
        $check = DocumentUpload::where('name', $request->input('name'))->where('branch_id', $request->input('branch_id'))->first();
        if($check){
            return redirect()->route('document_upload.create')->with('error', 'Document upload already exist in this area office!');
        }
        DocumentUpload::create($validated);
        return redirect()->route('document_upload.index')->with('success', 'Document upload added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(DocumentUpload $document_upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentUpload $document_upload)
    {
        if(Auth()->user()->hasRole('super-admin')){
            $branches = Branch::all();
            $services = Service::all();
        }else{
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }
        return view('document_upload.edit', compact(['document_upload', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentUploadRequest $request, DocumentUpload $document_upload)
    {
        $validated = $request->validated();
        $document_upload->update($validated);
        return redirect()->route('document_upload.index')->with('success', 'Document upload udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentUpload $document_upload)
    {
        if ($document_upload->delete())
            return redirect()->back()->with('success', 'Document upload deleted successfully!');
        return redirect()->back()->with('error', 'Document upload could not be deleted!');
    }

    
}

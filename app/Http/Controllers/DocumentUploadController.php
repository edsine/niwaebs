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
        $document_uploads = DocumentUpload::paginate(10);

        return view('document_upload.index', compact('document_uploads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        $branches = Branch::all();
        return view('document_upload.create', compact(['services','branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentUploadRequest $request)
    {
        $validated = $request->validated();
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
        $services = Service::all();
        $branches = Branch::all();
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

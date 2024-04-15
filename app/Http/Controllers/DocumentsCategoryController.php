<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentsCategoryRequest;
use App\Http\Requests\UpdateDocumentsCategoryRequest;
use App\Models\DocumentsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Department;

class DocumentsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        if (Auth()->user()->hasRole('super-admin')) {
        $documents_categories = DocumentsCategory::all();
    } else {
        $documents_categories = DocumentsCategory::where('department_id', Auth()->user()->staff->department->id)->get();
    }

        return view('documents_categories.index', compact('documents_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth()->user()->hasRole('super-admin')) {
            $departments = Department::get();
        } else {
            $departments = Department::where('id', Auth()->user()->staff->department->id)->get();
        }
         return view('documents_categories.create', compact('departments'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentsCategoryRequest $request)
{
    try {
        $validated = $request->validated();
        if (Auth()->user()->hasRole('super-admin')) {
        $validated['department_id'] = $request->input('department_id');
        } else {
        $validated['department_id'] = Auth()->user()->staff->department->id ?? 0;
        }
        $documents_category = DocumentsCategory::create($validated);
        return redirect()->route('documents_category.index')->with('success', 'Document category added successfully!');
    } catch (\Throwable $e) {
        // Log the error or handle it as needed
        return redirect()->back()->withErrors(['error' => 'Failed to add document category. Please try again.']);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(DocumentsCategory $documents_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentsCategory $documents_category)
    {
        if (Auth()->user()->hasRole('super-admin')) {
            $departments = Department::get();
        } else {
            $departments = Department::where('id', Auth()->user()->staff->department->id)->get();
        }
        return view('documents_categories.edit', compact(['documents_category', 'departments']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentsCategoryRequest $request, DocumentsCategory $documents_category)
    {
        $validated = $request->validated();
        if (Auth()->user()->hasRole('super-admin')) {
            $validated['department_id'] = $request->input('department_id');
            } else {
            $validated['department_id'] = Auth()->user()->staff->department->id ?? 0;
            }
        $documents_category->update($validated);
        return redirect()->route('documents_category.index')->with('success', 'Document category udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentsCategory $documents_category)
    {
        if ($documents_category->delete())
            return redirect()->back()->with('success', 'Document category deleted successfully!');
        return redirect()->back()->with('error', 'Document category could not be deleted!');
    }

    
}

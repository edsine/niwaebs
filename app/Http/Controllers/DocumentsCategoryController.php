<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentsCategoryRequest;
use App\Http\Requests\UpdateDocumentsCategoryRequest;
use App\Models\DocumentsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DocumentsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {

     if (Auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('SECRETARY')) {
        $documents_categories = DocumentsCategory::orderBy('id' ,'desc')->get();
        
        $documents_categories1 = DB::table('documents_categories')
    ->join('documents_manager', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->join('departments', 'documents_manager.department_id', '=', 'departments.id')
    ->select('documents_manager.id as doc_id', 'departments.name as d_name', 'documents_categories.*', DB::raw('COUNT(documents_manager.id) as count_documents_manager'), 'documents_categories.description', 'documents_categories.id as cat_id', 'documents_categories.created_at as createdAt', 'documents_categories.name as category_name')
    ->latest('documents_categories.created_at')
    ->groupBy('documents_manager.id', 'documents_categories.department_id', 'documents_categories.deleted_at', 'departments.name', 'documents_manager.branch_id', 'documents_manager.department_id', 'documents_manager.deleted_at', 'documents_categories.updated_at', 'documents_manager.updated_at', 'documents_manager.created_at', 'documents_manager.created_by', 'documents_manager.document_url', 'documents_categories.description', 'documents_manager.title', 'documents_categories.id', 'documents_categories.created_at', 'documents_categories.name')
    ->get();
    } else {
       

        $documents_categories1 = DB::table('documents_categories')
    ->join('documents_manager', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->join('departments', 'documents_manager.department_id', '=', 'departments.id')
    ->select('documents_manager.id as doc_id', 'departments.name as d_name', 'documents_categories.*', DB::raw('COUNT(documents_manager.id) as count_documents_manager'), 'documents_categories.description', 'documents_categories.id as cat_id', 'documents_categories.created_at as createdAt', 'documents_categories.name as category_name')
    ->latest('documents_categories.created_at')
    ->groupBy('documents_manager.id', 'documents_categories.department_id', 'documents_categories.deleted_at', 'departments.name', 'documents_manager.branch_id', 'documents_manager.department_id', 'documents_manager.deleted_at', 'documents_categories.updated_at', 'documents_manager.updated_at', 'documents_manager.created_at', 'documents_manager.created_by', 'documents_manager.document_url', 'documents_categories.description', 'documents_manager.title', 'documents_categories.id', 'documents_categories.created_at', 'documents_categories.name')
    ->get();
     $documents_categories = DocumentsCategory::orderBy('id' ,'desc')->where('department_id', Auth()->user()->staff->department->id)->get();
    } 


$users2 = DB::table('users')
    ->join('staff', 'staff.user_id', '=', 'users.id')
    ->join('departments', 'departments.id', '=', 'staff.department_id')
    ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name')
    //->where('staff.department_id', '=', Auth::user()->staff->department_id)
    //->where('staff.branch_id', '=', Auth::user()->staff->branch_id)
    ->get();

// Combine the data
//$mergedUsers = $users2;

// Process the data for display
$userData = $users2->map(function ($user) {
    return [
        'id' => $user->id,
        'name' => $user->first_name . ' ' . $user->last_name,
    ];
});

$users = $userData->pluck('name', 'id');


        return view('documents_categories.index', compact('documents_categories', 'users','documents_categories1'));
    }

    public function generateFileNo(Request $request) {
        $last_no = DocumentsCategory::where('department_id', $request->input('department_id'))->latest()->first();
    
        if ($last_no && is_numeric($last_no['name'])) {
            do {
                $fileNumber = $last_no['name'] + 1;
                $file_exists = DocumentsCategory::where('name', $fileNumber)->exists();
            } while ($file_exists);
        } else {
            $fileNumber = '10001';
        }
    
        return response()->json(['data' => ['name' => $fileNumber]]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('SECRETARY')) {
            $departments = Department::get();
        } else {
            //$departments = Department::where('id', Auth()->user()->staff->department->id)->get();
            return redirect()->back()->with('error', 'Permission denied for document audit trail access');
        }
         return view('documents_categories.create', compact('departments'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentsCategoryRequest $request)
{
    try {
        if (Auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('SECRETARY')) {
            $validated = $request->validated();
            /*  if (Auth()->user()->hasRole('super-admin')) {
             $validated['department_id'] = $request->input('department_id');
             } else {
             $validated['department_id'] = Auth()->user()->staff->department->id ?? 0;
             } */
             $documents_category = DocumentsCategory::create($validated);
             return redirect()->route('documents_category.index')->with('success', 'File added successfully!');
        } else {
            //$departments = Department::where('id', Auth()->user()->staff->department->id)->get();
            return redirect()->back()->with('error', 'Permission denied for document audit trail access');
        }
        
    } catch (\Throwable $e) {
        // Log the error or handle it as needed
        return redirect()->back()->withErrors(['error' => 'Failed to add File. Please try again.']);
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
        /* if (Auth()->user()->hasRole('super-admin')) {
            $validated['department_id'] = $request->input('department_id');
            } else {
            $validated['department_id'] = Auth()->user()->staff->department->id ?? 0;
            } */
        $documents_category->update($validated);
        return redirect()->route('documents_category.index')->with('success', 'File udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentsCategory $documents_category)
    {
        if ($documents_category->delete())
            return redirect()->back()->with('success', 'File deleted successfully!');
        return redirect()->back()->with('error', 'File could not be deleted!');
    }

    public function ajaxDestroy($id)
{
    // Logic to delete the document category with the given ID
    $documentCategory = DocumentsCategory::findOrFail($id);
    $documentCategory->delete();
    return response()->json(['success' => true]);
}

    
}

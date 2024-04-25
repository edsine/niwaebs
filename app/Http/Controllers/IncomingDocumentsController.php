<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendEmail;
use App\Models\IncomingMetaTag;
use App\Models\IncomingDocumentsCategory;
use App\Models\IncomingDocuments;
use App\Models\Documents;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\IncomingDocumentComment;
use App\Models\DocumentHasRole;
use App\Models\IncomingDocumentHasUser;
use App\Models\DocumentHistory;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Shared\Models\Department;
use Illuminate\Support\Facades\Storage;
use App\Repositories\IncomingDocumentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\CreateDocumentsRequest;
use App\Http\Requests\UpdateDocumentsRequest;
use App\Repositories\DocumentHasRoleRepository;
use App\Repositories\IncomingDocumentHasUserRepository;
use App\Repositories\IncomingDocumentsCategoryRepository;
use Modules\WorkflowEngine\Models\Staff;
use App\Models\DocumentsCategory;

class IncomingDocumentsController extends AppBaseController
{


    /** @var IncomingDocumentsRepository $documentRepository*/
    private $documentRepository;

    /** @var $userRepository UserRepository */
    private $userRepository;


    /** @var IncomingDocumentsCategoryRepository $documentsCategoryRepository*/
    private $documentsCategoryRepository;

    /** @var $roleRepository RoleRepository */
    private $roleRepository;

    private $documentHasUserRepository;

    private $documentHasRoleRepository;


    public function __construct(DocumentHasRoleRepository $documentHasRoleRepo, IncomingDocumentHasUserRepository $documentHasUserRepo, RoleRepository $roleRepo, IncomingDocumentsCategoryRepository $documentsCategoryRepo, IncomingDocumentsRepository $documentRepo,  UserRepository $userRepo)
    {

        $this->documentRepository = $documentRepo;
        $this->userRepository = $userRepo;
        $this->documentsCategoryRepository = $documentsCategoryRepo;
        $this->roleRepository = $roleRepo;
        $this->documentHasUserRepository = $documentHasUserRepo;
        $this->documentHasRoleRepository = $documentHasRoleRepo;
    }

    /**
     * Display a listing of the incoming_documents.
     */
    public function index(Request $request)
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $userId = Auth::user()->id;

        $userIds = IncomingDocumentHasUser::get()->pluck('user_id');
        $loggedInUserId = auth()->id(); // Get the ID of the logged-in user

        $user_id = $userIds->contains($loggedInUserId);

        if (Auth::user()->hasRole('super-admin') || Auth()->user()->hasRole('MANAGING DIRECTOR')) {
            // The logged-in user ID exists in the $userIds array
            //$documents = $this->documentRepository->paginate(10);
            $documents = \App\Models\IncomingDocuments::query()
            ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
            ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            ->select(
                'incoming_documents_categories.id as category_id',
                'incoming_documents_categories.name as category_name',
                'incoming_documents_manager.created_at as document_created_at',
                'incoming_documents_manager.id as d_id',
                'incoming_documents_manager.title',
                'incoming_documents_manager.full_name as sender_full_name',
                'incoming_documents_manager.email as sender_email',
                'incoming_documents_manager.phone as sender_phone',
                'incoming_documents_manager.document_url',
                'incoming_documents_categories.description as doc_description',
                'incoming_documents_manager.status',
                'incoming_documents_categories.name as cat_name',
                'departments.name as dep_name',
                    //'incoming_documents_has_users.user_id',
                    //'incoming_documents_has_users.assigned_by',
                    //DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name')
                    )
                ->where('incoming_documents_manager.status','!=', '0')
                ->latest('incoming_documents_manager.created_at')
                ->groupBy('incoming_documents_categories.description','incoming_documents_manager.document_url','incoming_documents_manager.title','incoming_documents_categories.id', 'incoming_documents_categories.name', 'incoming_documents_manager.created_at', 'incoming_documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                //->with('createdBy')
                ->get();


    // Get the roles with the specified role IDs
$roles = Role::whereIn('id', [26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39])->get();

// Get the users who have any of these roles
$users = User::whereHas('roles', function ($query) use ($roles) {
    $query->whereIn('id', $roles->pluck('id'));
})->get(['id', 'first_name', 'last_name']);

// Transform user data
$userData = $users->map(function ($user) {
    return [
        'id' => $user->id,
        'name' => $user->first_name . ' ' . $user->last_name,
    ];
});
   
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        
        $users = $userData->pluck('name', 'id');

} else{
            
    return redirect()->back()->with('error', 'Permission denied for recieved document access. Only the super admin and managing director have acces to this page.');
}


        

        return view('incoming_documents.index', compact('documents', 'users', 'roles'));
    }

    /**
     * Display a listing of the incoming_documents.
     */
    public function secretary(Request $request)
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $userId = Auth::user()->id;

        $userIds = IncomingDocumentHasUser::get()->pluck('user_id');
        $loggedInUserId = auth()->id(); // Get the ID of the logged-in user

        $user_id = $userIds->contains($loggedInUserId);

        if (Auth::user()->hasRole('super-admin') || Auth()->user()->hasRole('SECRETARY')) {
            
            // The logged-in user ID does not exist in the $userIds array
                $documents = IncomingDocuments::query()
                ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
                ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                ->select(
                    'incoming_documents_categories.id as category_id',
                    'incoming_documents_categories.name as category_name',
                    'incoming_documents_manager.created_at as document_created_at',
                    'incoming_documents_manager.id as d_id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.full_name as sender_full_name',
                    'incoming_documents_manager.email as sender_email',
                    'incoming_documents_manager.phone as sender_phone',
                    'incoming_documents_manager.document_url',
                    'incoming_documents_categories.description as doc_description',
                    'incoming_documents_manager.status',
                    'incoming_documents_categories.name as cat_name',
                    'departments.name as dep_name',
                    //'incoming_documents_has_users.user_id',
                    //'incoming_documents_has_users.assigned_by',
                    //DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name')
                    )
                ->where('incoming_documents_manager.status', '0')
                ->latest('incoming_documents_manager.created_at')
                ->groupBy('incoming_documents_categories.description','incoming_documents_manager.document_url','incoming_documents_manager.title','incoming_documents_categories.id', 'incoming_documents_categories.name', 'incoming_documents_manager.created_at', 'incoming_documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                //->with('createdBy')
                ->get();

                $roles1 = Role::whereIn('id', [2])->get();

// Get the users who have any of these roles
$userData = User::whereHas('roles', function ($query) use ($roles1) {
    $query->whereIn('id', $roles1->pluck('id'));
})->get(['id', \DB::raw('CONCAT(first_name, " ", last_name) AS name')]);

$roles = $this->roleRepository->all()->pluck('name', 'id');
        
        $users = $userData->pluck('name', 'id');

} else{
            
    return redirect()->back()->with('error', 'Permission denied for incoming / manual document access. Only the super admin and secretary have acces to this page.');
}

        

       return view('incoming_documents.secretary', compact('documents', 'users', 'roles'));
    }



    public function dashboard()
    {
        // return view('dms.dashboard');
        $result = \DB::select(\DB::raw('SELECT COUNT(name) AS num, name FROM incoming_documents_categories GROUP BY name'));
        $data = "";
        foreach ($result as $values) {
            $data .= "['" . $values->name . "',  " . $values->num . "],";
            # code...
        }
        $alldata = $data;
        // dd($data);
        return view('incoming_documents.dashboard', compact('alldata'));
    }

    public function documentsByAudits()
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */

        if (Auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('MANAGING DIRECTOR') || Auth()->user()->hasRole('SECRETARY')) {

        /* $documents = DB::table('documents_manager')
            ->join('audits', 'incoming_documents_manager.id', '=', 'audits.auditable_id')
            ->join('users', 'incoming_documents_manager.created_by', '=', 'users.id')
            ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            ->select('incoming_documents_manager.*', 'incoming_documents_manager.id as id', 'audits.*', 'users.*', 'incoming_documents_manager.created_at as createdAt', 'incoming_documents_categories.name as category_name')
            ->where('audits.auditable_type', "App\Models\Documents")
            ->latest('incoming_documents_manager.created_at')
            ->get(); */
            $documents = DB::table('incoming_documents_manager')
            ->join('audits', 'incoming_documents_manager.id', '=', 'audits.auditable_id')
            ->join('incoming_documents_has_users', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
            ->join('users as assigned_to_user', 'incoming_documents_has_users.user_id', '=', 'assigned_to_user.id')
            ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            ->select('incoming_documents_categories.id as d_c_id','incoming_documents_manager.*', 'incoming_documents_manager.id as id', 'audits.*', 'assigned_to_user.first_name as assigned_to_first_name', 'assigned_to_user.last_name as assigned_to_last_name', 'incoming_documents_manager.created_at as createdAt', 'incoming_documents_categories.name as category_name')
            ->where('audits.auditable_type', "App\Models\IncomingDocuments")
            ->latest('incoming_documents_manager.created_at')
            ->limit(5)
            ->distinct() // Ensure distinct results
            ->get();
            $documentIds = $documents->pluck('d_c_id')->toArray();
$categories = IncomingDocumentsCategory::whereIn('id', $documentIds)->get()->keyBy('id');
        } else{
            
            return redirect()->back()->with('error', 'Permission denied for document audit trail access');
        }

        return view('incoming_documents.document_audits', compact('documents','categories'));
    }

    public function documentsVersion(Request $request, $id)
    {
        //if (Auth()->user()->hasRole('super-admin')) {

        $documentHistory = DB::table('documents_histories')
           // ->join('documents_manager', 'documents_histories.created_by', '=', 'incoming_documents_manager.id')
            ->join('users', 'documents_histories.created_by', '=', 'users.id')
            ->select('documents_histories.*', 'documents_histories.created_at as createdAt', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_histories.document_url as doc_url')
            ->where('documents_histories.document_id', $id)
            //->latest('documents_histories.id')
            ->get();

        /* }else{

            $userId = Auth::user()->id;
        $documentHistory = DB::table('documents_histories')
           // ->join('documents_manager', 'documents_histories.created_by', '=', 'incoming_documents_manager.id')
            ->join('users', 'documents_histories.created_by', '=', 'users.id')
            ->select('documents_histories.*', 'documents_histories.created_at as createdAt', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_histories.document_url as doc_url')
            ->where('documents_histories.document_id', $id)
            ->where('documents_histories.created_by', '=', $userId)
            //->latest('documents_histories.id')
            ->get();

        } */

        return response()->json($documentHistory);
    }

    public function sharedUser()
    {
        /* /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $userId = Auth::user()->id;


        if (Auth::user()->hasRole('super-admin') || Auth()->user()->hasRole('MANAGING DIRECTOR')) {

    $documents = DB::table('incoming_documents_has_users')
    ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
    ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
    ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
    ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
    ->select(
        'incoming_documents_manager.category_id',
        'incoming_documents_categories.id',
        'incoming_documents_manager.title',
        'incoming_documents_manager.full_name as sender_full_name',
        'incoming_documents_manager.email as sender_email',
        'incoming_documents_manager.phone as sender_phone',
        'incoming_documents_has_users.created_at as createdAt',
        'incoming_documents_categories.name as category_name',
        'incoming_documents_has_users.start_date',
        'incoming_documents_has_users.end_date',
        'incoming_documents_has_users.allow_share',
        'incoming_documents_has_users.is_download',
        'incoming_documents_has_users.user_id',
        'incoming_documents_has_users.assigned_by',
        'incoming_documents_manager.document_url as document_url',
        'incoming_documents_manager.id as d_m_id',
        'incoming_documents_categories.id as d_m_c_id',
        'incoming_documents_categories.name as cat_name',
        'departments.name as dep_name',

        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
    )
    ->latest('incoming_documents_has_users.created_at')
    ->where('incoming_documents_has_users.assigned_by', '!=', '0')
    ->groupBy(
        'incoming_documents_manager.category_id',
        'incoming_documents_categories.id',
        'incoming_documents_has_users.start_date',
        'incoming_documents_has_users.end_date',
        'incoming_documents_manager.id',
        'incoming_documents_manager.title',
        'incoming_documents_manager.document_url',
        'incoming_documents_has_users.id',
        'incoming_documents_has_users.created_at',
        'incoming_documents_categories.name'
    )
    ->get();

    
    // Get the roles with the specified role IDs
$roles = Role::whereIn('id', [26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39])->get();

// Get the users who have any of these roles
$users0 = User::whereHas('roles', function ($query) use ($roles) {
    $query->whereIn('id', $roles->pluck('id'));
})->get(['id', 'first_name', 'last_name']);

// Transform user data
$userData = $users0->map(function ($user) {
    return [
        'id' => $user->id,
        'name' => $user->first_name . ' ' . $user->last_name,
    ];
});

        } else {
           

    //here
    $documents = DB::table('incoming_documents_has_users')
    ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
    ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
    ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
    ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
    ->select(
        'incoming_documents_manager.category_id',
        'incoming_documents_categories.id',
        'incoming_documents_manager.title',
        'incoming_documents_manager.full_name as sender_full_name',
        'incoming_documents_manager.email as sender_email',
        'incoming_documents_manager.phone as sender_phone',
        'incoming_documents_has_users.created_at as createdAt',
        'incoming_documents_categories.name as category_name',
        'incoming_documents_has_users.start_date',
        'incoming_documents_has_users.end_date',
        'incoming_documents_has_users.allow_share',
        'incoming_documents_has_users.is_download',
        'incoming_documents_has_users.user_id',
        'incoming_documents_has_users.assigned_by',
        'incoming_documents_manager.document_url as document_url',
        'incoming_documents_manager.id as d_m_id',
        'incoming_documents_categories.id as d_m_c_id',
        'incoming_documents_categories.name as cat_name',
        'departments.name as dep_name',

        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
    )
    ->latest('incoming_documents_has_users.created_at')
    ->groupBy(
        'incoming_documents_categories.id',
        'incoming_documents_has_users.start_date',
        'incoming_documents_has_users.end_date',
        'incoming_documents_manager.id',
        'incoming_documents_manager.title',
        'incoming_documents_manager.document_url',
        'incoming_documents_has_users.id',
        'incoming_documents_has_users.created_at',
        'incoming_documents_categories.name'
    )
    ->where('incoming_documents_has_users.user_id', '=', $userId)
    ->get();

    
    // Fetch roles
//$roles2 = Role::whereIn('id', [2])->get();

// Get the users who have any of these roles
/* $users1 = User::whereHas('roles', function ($query) use ($roles2) {
    $query->whereIn('id', $roles2->pluck('id'));
})->get(['id', 'first_name', 'last_name']); */

$users2 = DB::table('users')
    ->join('staff', 'staff.user_id', '=', 'users.id')
    ->join('departments', 'departments.id', '=', 'staff.department_id')
    ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name')
    ->where('staff.department_id', '=', Auth::user()->staff->department_id)
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


        
        }

        // Now that you have the documents, you can load the category relationship
$documentIds = $documents->pluck('d_m_c_id')->toArray();
$categories = IncomingDocumentsCategory::whereIn('id', $documentIds)->get()->keyBy('id');


        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
       /*  $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        }); */

        $users = $userData->pluck('name', 'id');

        return view('incoming_documents.document_shared_user', compact('documents', 'users', 'roles', 'categories'));
    }

    public function showIncomingDepartementalDocuments(Request $request, $id)
{
    $documents = \App\Models\IncomingDocuments::query()
            ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
            ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            ->select(
                'incoming_documents_categories.id as category_id',
                'incoming_documents_categories.name as category_name',
                'incoming_documents_manager.created_at as assigned_created_at',
                'incoming_documents_manager.id as d_m_id',
                'incoming_documents_manager.title',
                'incoming_documents_manager.full_name as sender_full_name',
                'incoming_documents_manager.email as sender_email',
                'incoming_documents_manager.phone as sender_phone',
                'incoming_documents_manager.document_url',
                'incoming_documents_categories.description as doc_description',
                'incoming_documents_manager.status',
                'incoming_documents_categories.name as cat_name',
                'departments.name as dep_name',
                    )
                ->where('incoming_documents_manager.status','!=', '0')
                ->latest('incoming_documents_manager.created_at')
                ->groupBy('incoming_documents_categories.description','incoming_documents_manager.document_url','incoming_documents_manager.title','incoming_documents_categories.id', 'incoming_documents_categories.name', 'incoming_documents_manager.created_at', 'incoming_documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                ->where('incoming_documents_manager.department_id', '=', $id)
                ->limit(5)
                ->get();


    return response()->json($documents);
}

    public function sharedRole()
    {
        /* /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        // Get the currently authenticated user
        $user = Auth::user();
        // Get the role IDs of the user
        $roleIds = $user->getRoleNames()->map(function ($roleName) {
            return Role::where('name', $roleName)->first()->id;
        });

        // If the user has only one role, you can directly access it like this:
        $roleId = $roleIds->first();

        if (Auth::user()->hasRole('super-admin') || Auth()->user()->hasRole('MANAGING DIRECTOR') || Auth()->user()->hasRole('SECRETARY')) {
            $documents = DB::table('documents_has_roles')
                ->join('documents_manager', 'incoming_documents_manager.id', '=', 'documents_has_roles.document_id')
                ->join('roles', 'roles.id', '=', 'documents_has_roles.role_id')
                ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                ->select(
                    'documents_has_roles.start_date as start_date',
                    'documents_has_roles.end_date as end_date',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.id as id',
                    'incoming_documents_manager.document_url',
                    'roles.name as role_name',
                    'incoming_documents_categories.name as category_name',
                    'incoming_documents_manager.category_id as category_id',
                )
                ->latest('incoming_documents_manager.created_at')
                ->get();
        } else {
            $documents = DB::table('documents_has_roles')
                ->join('documents_manager', 'incoming_documents_manager.id', '=', 'documents_has_roles.document_id')
                ->join('roles', 'roles.id', '=', 'documents_has_roles.role_id')
                ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                ->select(
                    'documents_has_roles.start_date as start_date',
                    'documents_has_roles.end_date as end_date',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.id as id',
                    'incoming_documents_manager.document_url',
                    'roles.name as role_name',
                    'incoming_documents_categories.name as category_name',
                    'incoming_documents_manager.category_id as category_id',
                )
                ->latest('incoming_documents_manager.created_at')
                ->where('documents_has_roles.role_id', $roleId)
                ->get();
        }

        // Now that you have the documents, you can load the category relationship
$documentIds = $documents->pluck('document_id')->toArray();
$categories = DocumentsCategory::whereIn('id', $documentIds)->get()->keyBy('id');

        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
        $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        $users = $userData->pluck('name', 'id');


        return view('incoming_documents.document_shared_role', compact('documents', 'users', 'roles', 'categories'));
    }

    public function shareDocument(Request $request, $id)
    {
        if (Auth::user()->hasRole('super-admin') || Auth()->user()->hasRole('MANAGING DIRECTOR') || Auth()->user()->hasRole('SECRETARY')) {
        $share_documents = DB::table('documents_manager')
            //->join('documents_has_roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->join('incoming_documents_has_users', 'incoming_documents_has_users.document_id', '=', 'incoming_documents_manager.id')
            ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id') // Join with the 'users' table
            ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            //->join('roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->select('incoming_documents_manager.*', 'incoming_documents_has_users.*', 'users.email as uemail', 'users.first_name as firstName', 'users.last_name as lastName', 'incoming_documents_manager.created_at as createdAt', 'incoming_documents_categories.name as category_name', 'incoming_documents_manager.document_url as doc_url', 'incoming_documents_manager.description as doc_desc', 'incoming_documents_has_users.is_download')
            ->latest('incoming_documents_manager.created_at')
            ->where('incoming_documents_manager.id', $id)
            ->get();
        }else{
            $share_documents = DB::table('documents_manager')
            //->join('documents_has_roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->join('incoming_documents_has_users', 'incoming_documents_has_users.document_id', '=', 'incoming_documents_manager.id')
            ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id') // Join with the 'users' table
            ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            //->join('roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->select('incoming_documents_manager.*', 'incoming_documents_has_users.*', 'users.email as uemail', 'users.first_name as firstName', 'users.last_name as lastName', 'incoming_documents_manager.created_at as createdAt', 'incoming_documents_categories.name as category_name', 'incoming_documents_manager.document_url as doc_url', 'incoming_documents_manager.description as doc_desc', 'incoming_documents_has_users.is_download')
            ->latest('incoming_documents_manager.created_at')
            ->where('incoming_documents_has_users.user_id', Auth()->user()->id)
            ->where('incoming_documents_manager.id', $id)
            ->get();
        }

        return response()->json($share_documents);
        /* try {
    $share_documents = DB::table('documents_manager')
        ->join('incoming_documents_has_users', 'incoming_documents_has_users.document_id', '=', 'incoming_documents_manager.id')
        ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
        ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
        ->leftJoin('model_has_roles', function ($join) {
            $join->on('model_has_roles.model_id', '=', 'users.id')
                 ->where('model_has_roles.model_type', '=', 'App\User');
        })
        ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->join('documents_has_roles', 'documents_has_roles.document_id', '=', 'incoming_documents_manager.id')
        ->select('incoming_documents_manager.*', 'incoming_documents_has_users.*', 'users.email as uemail', 'users.first_name as firstName', 'users.last_name as lastName', 'roles.name as role_name', 'incoming_documents_manager.created_at as createdAt', 'incoming_documents_categories.name as category_name', 'incoming_documents_manager.document_url as doc_url', 'incoming_documents_manager.description as doc_desc')
        ->latest('incoming_documents_manager.created_at')
        ->where('incoming_documents_manager.id', $id)
        ->get();

    return response()->json($share_documents);
} catch (\Exception $e) {
    return response()->json(['error' => $e->getMessage()], 500);
} */
    }

    public function documentsComment(Request $request, $id)
    {
        $documentHistory = DB::table('documents_comments')
            ->join('users', 'documents_comments.created_by', '=', 'users.id')
            ->join('documents_manager', 'documents_comments.document_id', '=', 'incoming_documents_manager.id')
            ->select('documents_comments.*', 'documents_comments.created_at as createdAt', 'users.first_name as firstName', 'users.last_name as lastName', 'incoming_documents_manager.document_url as doc_url')
            ->where('documents_comments.document_id', $id)
            ->get();

        return response()->json($documentHistory);
    }

    public function sendEmail(Request $request)
    {
        try {
            $subject = $request->input('subject');
            $body = $request->input('body');
            $attachment = $request->input('attachment');

            // Send the email using the SendEmail Mailable
            Mail::to($request->input('to'))->send(new SendEmail($subject, $body, $attachment));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email. Please try again later. ERROR:' . $e);
        }
    }

    // public function getusersbydept($deptid, $branchid)
    // {
    //     if (!is_array($deptid)) {
    //         $deptid = [$deptid];
    //     }
    //     $users = Staff::whereIn('department_id', $deptid)
    //         ->join('users', 'users.id', 'staff.id')
    //         ->where('staff.branch_id', $branchid)
    //         ->get();
    //     return response()->json($users);
    // }
    public function getusersbydept(Request $request)
    {
        $users = collect();
        $deptids = $request->input('deptid');
        $branchids = $request->input('branchid');

        foreach ($deptids as $deptid) {
            foreach ($branchids as $branchid) {
                if ($deptid == '' && $branchid == '') {
                    // Fetch all users
                    $users = $users->merge(
                        Staff::join('users', 'staff.user_id', 'users.id')->get()
                    );
                } elseif ($deptid == '') {
                    // Fetch users based on branch
                    $users = $users->merge(
                        Staff::where('branch_id', $branchid)
                            ->join('users', 'staff.user_id', 'users.id')->get()
                    );
                } elseif ($branchid == '') {
                    // Fetch users based on department
                    $users = $users->merge(
                        Staff::where('department_id', $deptid)
                            ->join('users', 'staff.user_id', 'users.id')->get()
                    );
                } else {
                    // Fetch users based on both department and branch
                    $users = $users->merge(
                        Staff::where('department_id', $deptid)
                            ->where('branch_id', $branchid)
                            ->join('users', 'staff.user_id', 'users.id')->get()
                    );
                }
            }
        }

        return response()->json($users);
    }






    public function documentsByUsers()
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        $documents = $this->documentRepository->paginate(10);

        return view('incoming_documents.document_user', compact('documents'));
    }

    public function documentsByRole(Request $request)
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        $documents = $this->documentHasRoleRepository->paginate(10);

        return view('incoming_documents.document_role', compact('documents'));
    }

    /**
     * Display a listing of the Document assigned to a specific user.
     */
    public function viewDocumentAssignedToUser()
    {
        $user = Auth::user();
        $memos_has_user = $this->documentHasUserRepository->findByUser($user->id)->paginate(10);

        return view('documentmanager::memos.memos_assigned_to_user')
            ->with(['user' => $user, 'memos_has_user' => $memos_has_user]);
    }

    /**
     * Show the form for creating a new incoming document no authentication.
     */
    public function create()
    {
        
            $categories1 = DB::table('incoming_documents_categories')
            ->join('departments', 'departments.id', '=', 'incoming_documents_categories.department_id')
            //->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            ->select('incoming_documents_categories.description as subject', 'departments.name as department_name', 'incoming_documents_categories.id as documents_category_id', 'incoming_documents_categories.name as category_name', 'incoming_documents_categories.description as documents_category_description')
            ->where('departments.id', 15)
            ->get();
            $categories = $categories1->map(function ($category) {
                return [
                    'id' => $category->documents_category_id,
                    'name' => $category->department_name . ' / ' .  $category->category_name . ' / ' .  $category->subject,
                ];
            })->pluck('name', 'id')->toArray();
        
            
        //$roles = Role::pluck('name', 'id')->all();
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
        $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        $users = $userData->pluck('name', 'id');
        //$users->prepend('Select user', '');
        $dept = Department::where('id',15)->get();
        // dd($dept);
        $office = Branch::get();


        return view('incoming_documents.create', compact(['categories', 'users', 'roles', 'dept', 'office']));
    }

    public function add_document()
    {
        
            $categories1 = DB::table('incoming_documents_categories')
            ->join('departments', 'departments.id', '=', 'incoming_documents_categories.department_id')
            //->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            ->select('incoming_documents_categories.description as subject', 'departments.name as department_name', 'incoming_documents_categories.id as documents_category_id', 'incoming_documents_categories.name as category_name', 'incoming_documents_categories.description as documents_category_description')
            ->where('departments.id', 15)
            ->get();
            $categories = $categories1->map(function ($category) {
                return [
                    'id' => $category->documents_category_id,
                    'name' => $category->department_name . ' / ' .  $category->category_name . ' / ' .  $category->subject,
                ];
            })->pluck('name', 'id')->toArray();
        
            
        //$roles = Role::pluck('name', 'id')->all();
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
        $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        $users = $userData->pluck('name', 'id');
        //$users->prepend('Select user', '');
        $dept = Department::where('id',15)->get();
        // dd($dept);
        $office = Branch::get();


        return view('incoming_documents.add', compact(['categories', 'users', 'roles', 'dept', 'office']));
    }

    

    public function shareUser(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();

        /* $document = IncomingDocumentHasUser::where('document_id', $request->shareuser_id)->first();
        if($document){
        $document->start_date = $request->start_date;
        $document->end_date = $request->end_date;
        $document->is_download = $request->is_download;
        $document->save();
        } */

        //$document = IncomingDocumentHasUser::where('document_id', $request->shareuser_id)->first();

        // Assign to user(s)
        $users = $input['users'];
        if ($users != null) {
            $logged_in_user = Auth::user();
            foreach ($users as $key => $user_id) {
                $input_fields['user_id'] = $user_id;
                $input_fields['document_id'] = $request->shareuser_id;
                $input_fields['assigned_by'] = $logged_in_user->id;
                $input_fields['start_date'] = $request->start_date;
                $input_fields['end_date'] = $request->end_date;
                $input_fields['is_download'] = $request->is_download;
                $input_fields['allow_share'] = $request->allow_share;


                $this->documentHasUserRepository->create($input_fields);

                /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) { 
            } */
            }
            IncomingDocumentComment::create([
                'created_by' => $user->id,
                'document_id' => $request->shareuser_id,
                'comment' => $request->comment,
            ]);
            //$this->_assignToUsers($users, $document);
        }

        $notify_id = $input['notify_id'];
         if ($notify_id != null) {
            $find = IncomingDocuments::find($request->shareuser_id);
            $find->status = '1';
            $find->approved_date_time = $request->approved_date_time;
            $find->save();

        Flash::success('Letter received and sent successfully.');

        return redirect(route('incoming_documents_manager.all_documents.secretary'));
    }
    if ($notify_id == null) {
        Flash::success('Document shared successfully.');

        return redirect()->back();
    }

    }

    public function shareRole(Request $request)
    {

        $input = $request->all();

        //$document = DocumentHasRole::where('document_id', $request->sharerole_id)->first();

        $roles = $input['roles'];
        if ($roles != null) {
            $logged_in_user = Auth::user();
            foreach ($roles as $key => $role_id) {
                $role = Role::find($role_id); // Find the role by its ID
                $input_fields['role_id'] = $role_id;
                $input_fields['document_id'] = $request->sharerole_id;
                $input_fields['assigned_by'] = $logged_in_user->id;
                $input_fields['start_date'] = $request->start_date;
                $input_fields['end_date'] = $request->end_date;
                $input_fields['is_download'] = $request->is_download;

                $this->documentHasRoleRepository->create($input_fields);

                // Additional logic if needed

            }
        }

        //$this->documentHasRoleRepository->create($input_fields);
        Flash::success('Role permissions shared successfully.');

        return redirect(route('incoming_documents_manager.sharedrole'));
    }

    /**
     * Store a newly created Memo in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
    $validatedData = $request->validate([
        'title' => 'required',
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'description' => 'required',
        'file' => 'required|mimes:pdf,doc,docx,jpeg,png,gif|max:1024',
    ], [
        'file.mimes' => 'Please select a valid file format (PDF, DOC, DOCX, JPEG, PNG, GIF).',
        'file.max' => 'File size exceeds the maximum limit of 1MB.',
    ]);

        //$user = Auth::user();
        $input = $validatedData;
        $input['created_by'] = 0;

        // Get folder and its parents. Create if path does not exist
       




        // Check if document with title exist in the folder
        $title = $input['title']; // Assuming the title is provided in the input array

        // Check if a document with the given title already exists
       // $existingDocument = IncomingDocuments::where('title', $title)->first();

        /* if ($existingDocument !== null) {
            // Document with the same title already exists
            Flash::error('Document with the same name already exists');
            return redirect()->back();
        } */


        // Prepare document input
        $document_input = [];


        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];
        $document_input['full_name'] = $input['full_name'];
        $document_input['email'] = $input['email'];
        $document_input['phone'] = $input['phone'];

        /* if (isset($input['category_id'])) {

            $document_input['category_id'] = $input['category_id'];
        } */
        $document_input['category_id'] = 1;
        $document_input['created_by'] = 0;


        $path = "documents";
        $path_folder = public_path($path);
        // Save file
        $file = $request->file('file');
        $title = str_replace(' ', '', $input['title']);
        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);
        $document_url = $path . "/" . $file_name;
        $document_input['document_url'] = $document_url;
        $document_input['status'] = '0';
        $document_input['department_id'] = "15";
        $document = $this->documentRepository->create($document_input);

        DocumentHistory::create([
            'created_by' => 0,
            'document_id' => $document->id,
            'document_url' => $document_url,
        ]);

        // Save document version

        // Assign to roles(s)
       // $roleId = $user->roles->pluck('id')->all();
        //$userId = $user->id;
        //$roles = $roleId; //$input['roles'];
        /* if ($roles != null) {
            $this->_assignToRoles($roles, $document);
        } */
        // Assign to user(s)
        
       // $users = [$userId]; // Convert $userId to an array
       // if ($users != null) {
        //    $this->_assignToUsers($users, $document);
        //}
        //$this->_assignToUsers1(0, $document);

        // Retrieve meta tags from the request
       /*  $metaTags = $request->input('meta_tags');
        // Iterate over each meta tag and save it to the database
        foreach ($metaTags as $tag) {
            IncomingMetaTag::create([
                'name' => $tag,
                'document_id' => $document->id,
                'created_by' => $user->id,
            ]);
        } */

        return redirect()->back()->with('success', 'Document sent successfully. We will get back to you later. Thank you');

    }

    public function add(Request $request)
    {

        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $user = Auth::user();
        $input = $request->all();
        // $input['created_by'] = $user->id;

        // Get folder and its parents. Create if path does not exist
        $path = "documents";


        // Prepare document input
        $document_input = [];

        $doc = IncomingDocuments::find($request->upload_id);

        $path_folder = public_path($path);
        // Save file
        $file = $request->file('file');
        $title = str_replace(' ', '', $doc->title);
        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);
        $document_url = $path . "/" . $file_name;
        $document_input['document_url'] = $document_url;
        $document = $this->documentRepository->update($document_input, $request->upload_id);

        DocumentHistory::create([
            'created_by' => $user->id,
            'document_id' => $document->id,
            'document_url' => $document_url,
        ]);


        Flash::success('New document version saved successfully.');

        return redirect(route('incoming_documents_manager.index'));
    }

    public function addComment(Request $request)
    {

        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $user = Auth::user();
        $input = $request->all();

        IncomingDocumentComment::create([
            'created_by' => $user->id,
            'document_id' => $request->comment_id,
            'comment' => $request->comment,
        ]);


        Flash::success('New comment saved successfully.');

        return redirect(route('incoming_documents_manager.index'));
    }
    /**
     * Assign memo to users
     */

    public function assignToUsers(Request $request)
    {
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $users = $input['users'];

        /* if (!checkPermission('assign memo to user')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->_assignToUsers($users, $memo);

        Flash::success('Memo assigned successfully to user(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Assign memo to departments
     */

    public function assignToDepartments(Request $request)
    {
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $departments = $input['departments'];

        /* if (!checkPermission('assign memo to department')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->_assignToRoles($departments, $memo);

        Flash::success('Memo assigned successfully to roles(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Display a listing of the assigned users to a Memo.
     */
    public function assignedUsers(Request $request, $id)
    {
        /* if (!checkPermission('read user-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $assigned_users = $memo->assignedUsers()->paginate();

        return view('documentmanager::memos.assigned_users')
            ->with(['memo' => $memo, 'assigned_users' => $assigned_users]);
    }

    /**
     * Display a listing of the assigned departments to a Memo.
     */
    public function assignedDepartments(Request $request, $id)
    {
        /*  if (!checkPermission('read department-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $assigned_departments = $memo->assignedDepartments()->paginate();

        return view('documentmanager::memos.assigned_departments')
            ->with(['memo' => $memo, 'assigned_departments' => $assigned_departments]);
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedUser($user_id, $memo_id)
    {
        /* if (!checkPermission('delete user-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo_has_user = $this->memoHasUserRepository->findByUserAndMemo($user_id, $memo_id);

        if (empty($memo_has_user)) {
            Flash::error('Assignment not found');

            return redirect(route('memos.assignedUsers', $memo_id));
        }

        $this->memoHasUserRepository->delete($memo_has_user->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('memos.assignedUsers', $memo_id));
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedDepartment($department_id, $memo_id)
    {
        /* if (!checkPermission('delete department-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo_has_department = $this->memoHasDepartmentRepository->findByDepartmentAndMemo($department_id, $memo_id);

        if (empty($memo_has_department)) {
            Flash::error('Assignment not found');

            return redirect(route('memos.assignedDepartments', $memo_id));
        }

        $this->memoHasDepartmentRepository->delete($memo_has_department->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('memos.assignedDepartments', $memo_id));
    }

    /**
     * Display a listing of the Memo Versions.
     */
    public function memoVersions(Request $request, $id)
    {
        /* if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $memo_document = $this->documentRepository->find($memo->document_id);

        if (empty($memo_document)) {
            Flash::error("Memo's document not found");

            return redirect(route('memos.index'));
        }

        $memoVersions = $memo_document->documentVersions()->paginate(10);

        return view('documentmanager::memos.memo_versions.index')
            ->with(['memo' => $memo, 'memo_document' => $memo_document, 'documentVersions' => $memoVersions]);
    }


    /**
     * Display the specified Memo.
     */
    public function show($id)
    {
        /* if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = null;

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('documentmanager::memos.show')->with('memo', $memo);
    }

    /**
     * Show the form for editing the specified Document.
     */
    public function edit($id)
    {
        /* if (!checkPermission('update document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('incoming_documents_manager.index'));
        }
        $categories = $this->documentsCategoryRepository->all()->pluck('name', 'id');
        //$roles = Role::pluck('name', 'id')->all();
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
        $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        $users = $userData->pluck('name', 'id');
        $single_user = User::find($id);
        $single_doc = IncomingDocumentHasUser::where('document_id', $id)->get();
        $single_role = DocumentHasRole::where('document_id', $id)->get();
        $single_metas = IncomingMetaTag::where('document_id', $id)->get();

        return view('incoming_documents.edit', compact('document', 'categories', 'users', 'roles', 'single_role', 'single_doc', 'single_metas'));
    }

    /**
     * Update the specified Document in storage.
     */
    public function update($id, Request $request)
    {
        /* if (!checkPermission('update document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $input = $request->all();
        $document = $this->documentRepository->find($id);
        $document_id = $document->id;

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('incoming_documents_manager.index'));
        }


        if ($request->hasFile('file')) {
            $path = "documents";
            // Save file
            $path_folder = public_path($path);
            $file = $request->file('file');

            $title = str_replace(' ', '', $document->title);

            $file_name = $title . '_' . 'v' . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $file->move($path_folder, $file_name);

            $document_url = $path . "/" . $file_name;
            $document_input['document_url'] = $document_url;
        }

        // Save document

        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];
        $document_input['category_id'] = $input['category_id'];

        $user = Auth::user();


        $document = $this->documentRepository->update($document_input, $document_id);

        $document_history = DocumentHistory::where('document_id', $document_id)->first();
        if ($document_history) {
            $document_history->created_by = $user->id;
            if ($request->hasFile('file')) {
                $document_history->document_url =  $document_url;
            }
            $document_history->save();
        }


        IncomingMetaTag::where('document_id', $document_id)->delete();
        DocumentHasRole::where('document_id', $document_id)->delete();
        IncomingDocumentHasUser::where('document_id', $document_id)->delete();

        // Assign to roles(s)
        $roleId = $user->roles->pluck('id')->all();
        $userId = $user->id;

        $roles = $roleId;//$input['roles'];
        if ($roles != null) {
            $this->_assignToRoles($roles, $document);
        }
        // Assign to user(s)
        $users = [$userId]; // Convert $userId to an array
        if ($users != null) {
            $this->_assignToUsers($users, $document);
        }

        // Retrieve meta tags from the request
        $metaTags = $request->input('meta_tags');
        // Iterate over each meta tag and save it to the database
        foreach ($metaTags as $tag) {
            IncomingMetaTag::create([
                'name' => $tag,
                'document_id' => $document->id,
                'created_by' => $user->id,
            ]);
            /*  $meta_tag = IncomingMetaTag::where('document_id', $document_id)->first();
       if ($meta_tag) {
       $meta_tag->created_by = $user->id;
       $meta_tag->name =  $tag;
       $meta_tag->save();
       } */
        }



        Flash::success('Document updated successfully.');

        return redirect(route('incoming_documents_manager.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /* if (!checkPermission('delete document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('incoming_documents_manager.index'));
        }

        $this->documentRepository->delete($id);
        $document_history = DocumentHistory::where('document_id', $id)->delete();
        IncomingMetaTag::where('document_id', $id)->delete();
        DocumentHasRole::where('document_id', $id)->delete();
        IncomingDocumentHasUser::where('document_id', $id)->delete();


        Flash::success('Document deleted successfully.');

        return redirect(route('incoming_documents_manager.index'));
    }





    public function _assignToRoles($roles, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($roles as $key => $role_id) {
            $input_fields['role_id'] = $role_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;


            $this->documentHasRoleRepository->create($input_fields);


            /* try {
                Notification::send($department->users, new MemoAssignedToDepartment($department, $memo));
            } catch (\Throwable $th) {
            } */
        }
    }

    public function _assignToUsers($users, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($users as $key => $user_id) {
            $input_fields['user_id'] = $user_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;



            $this->documentHasUserRepository->create($input_fields);

        }
    }

    public function _assignToUsers1($users, $document)
    {
        $input_fields['user_id'] = $users;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = 0;



            $this->documentHasUserRepository->create($input_fields);
    }

    public function _assignedToRoles($roles, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($roles as $key => $role_id) {
            $input_fields['role_id'] = $role_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            $document_has_role = DocumentHasRole::where('document_id', $document->id)->first();
            if ($document_has_role) {
                $document_has_role->assigned_by = $logged_in_user->id;
                $document_has_role->role_id =  $role_id;
                $document_has_role->save();
            }
            //$this->documentHasRoleRepository->create($input_fields);


            /* try {
                Notification::send($department->users, new MemoAssignedToDepartment($department, $memo));
            } catch (\Throwable $th) {
            } */
        }
    }

    public function _assignedToUsers($users, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($users as $key => $user_id) {
            $input_fields['user_id'] = $user_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            $document_has_user = IncomingDocumentHasUser::where('document_id', $document->id)->first();
            if ($document_has_user) {
                $document_has_user->assigned_by = $logged_in_user->id;
                $document_has_user->user_id =  $user_id;
                $document_has_user->save();
            }
            //$this->documentHasUserRepository->create($input_fields);

            /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) {
            } */
        }
    }
}

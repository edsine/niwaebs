<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendEmail;
use App\Models\MetaTag;
use App\Models\Documents;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\DocumentComment;
use App\Models\DocumentHasRole;
use App\Models\DocumentHasUser;
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
use App\Repositories\DocumentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\CreateDocumentsRequest;
use App\Http\Requests\UpdateDocumentsRequest;
use App\Repositories\DocumentHasRoleRepository;
use App\Repositories\DocumentHasUserRepository;
use App\Repositories\DocumentsCategoryRepository;
use Modules\WorkflowEngine\Models\Staff;

class DocumentsController extends AppBaseController
{


    /** @var DocumentRepository $documentRepository*/
    private $documentRepository;

    /** @var $userRepository UserRepository */
    private $userRepository;


    /** @var DocumentsCategoryRepository $documentsCategoryRepository*/
    private $documentsCategoryRepository;

    /** @var $roleRepository RoleRepository */
    private $roleRepository;

    private $documentHasUserRepository;

    private $documentHasRoleRepository;


    public function __construct(DocumentHasRoleRepository $documentHasRoleRepo, DocumentHasUserRepository $documentHasUserRepo, RoleRepository $roleRepo, DocumentsCategoryRepository $documentsCategoryRepo, DocumentsRepository $documentRepo,  UserRepository $userRepo)
    {

        $this->documentRepository = $documentRepo;
        $this->userRepository = $userRepo;
        $this->documentsCategoryRepository = $documentsCategoryRepo;
        $this->roleRepository = $roleRepo;
        $this->documentHasUserRepository = $documentHasUserRepo;
        $this->documentHasRoleRepository = $documentHasRoleRepo;
    }

    /**
     * Display a listing of the documents.
     */
    public function index(Request $request)
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $userId = Auth::user()->id;

        $userIds = DocumentHasUser::get()->pluck('user_id');
        $loggedInUserId = auth()->id(); // Get the ID of the logged-in user

        $user_id = $userIds->contains($loggedInUserId);

        if (Auth::user()->hasRole('super-admin')) {
            // The logged-in user ID exists in the $userIds array
            //$documents = $this->documentRepository->paginate(10);
            $documents = \App\Models\Documents::query()
                ->join('documents_has_users', 'documents_manager.id', '=', 'documents_has_users.document_id')
                ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
                ->select('documents_manager.*', 'documents_has_users.*', 'documents_categories.*')
                ->latest('documents_manager.created_at')
                ->with('createdBy') // Add this line to eager load the createdBy relation
                ->paginate(10);
            //} else if ($userIds->contains($loggedInUserId)) {

        } else {
            // The logged-in user ID does not exist in the $userIds array
            $documents = \App\Models\Documents::query()
                ->join('documents_has_users', 'documents_manager.id', '=', 'documents_has_users.document_id')
                ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
                ->select('documents_manager.*', 'documents_has_users.*', 'documents_categories.*')
                ->where('documents_has_users.user_id', $userId)
                ->latest('documents_manager.created_at')
                ->with('createdBy') // Add this line to eager load the createdBy relation
                ->paginate(10);
        }


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

        return view('documents.index', compact('documents', 'users', 'roles'));
    }

    public function documentsByAudits()
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        $documents = DB::table('documents_manager')
            ->join('audits', 'documents_manager.id', '=', 'audits.auditable_id')
            ->join('users', 'documents_manager.created_by', '=', 'users.id')
            ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
            ->select('documents_manager.*', 'audits.*', 'users.*', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name')
            ->where('audits.auditable_type', "App\Models\Documents")
            ->latest('documents_manager.created_at')
            ->paginate(10);

        return view('documents.document_audits', compact('documents'));
    }

    public function documentsVersion(Request $request, $id)
    {
        $documentHistory = DB::table('documents_histories')
            ->join('documents_manager', 'documents_histories.created_by', '=', 'documents_manager.id')
            ->join('users', 'documents_histories.created_by', '=', 'users.id')
            ->select('documents_histories.*', 'documents_histories.created_at as createdAt', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_manager.document_url as doc_url')
            ->where('documents_histories.document_id', $id)
            ->get();

        return response()->json($documentHistory);
    }

    public function sharedUser()
    {
        /* /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $userId = Auth::user()->id;


        if (Auth::user()->hasRole('super-admin')) {
            $documents = DB::table('documents_has_users')
                ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users.document_id')
                ->join('users', 'documents_has_users.user_id', '=', 'users.id')
                ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
                ->select('documents_has_users.*', 'documents_manager.*', 'users.*', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name')
                ->latest('documents_has_users.created_at')
                ->paginate(10);
        } else {
            $documents = DB::table('documents_has_users')
                ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users.document_id')
                ->join('users', 'documents_has_users.user_id', '=', 'users.id')
                ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
                ->select('documents_has_users.*', 'documents_manager.*', 'users.*', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name')
                ->latest('documents_has_users.created_at')
                ->where('documents_has_users.user_id', $userId)
                ->paginate(10);
        }

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

        return view('documents.document_shared_user', compact('documents','users','roles'));
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

        if (Auth::user()->hasRole('super-admin')) {
            $documents = DB::table('documents_has_roles')
                ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_roles.document_id')
                ->join('roles', 'roles.id', '=', 'documents_has_roles.role_id')
                ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
                ->select(
                    'documents_has_roles.start_date as start_date',
                    'documents_has_roles.end_date as end_date',
                    'documents_manager.title',
                    'documents_manager.document_url',
                    'roles.name as role_name',
                    'documents_categories.name as category_name'
                )
                ->latest('documents_manager.created_at')
                ->paginate(10);
        } else {
            $documents = DB::table('documents_has_roles')
                ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_roles.document_id')
                ->join('roles', 'roles.id', '=', 'documents_has_roles.role_id')
                ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
                ->select(
                    'documents_has_roles.start_date as start_date',
                    'documents_has_roles.end_date as end_date',
                    'documents_manager.title',
                    'documents_manager.document_url',
                    'roles.name as role_name',
                    'documents_categories.name as category_name'
                )
                ->latest('documents_manager.created_at')
                ->where('documents_has_roles.role_id', $roleId)
                ->paginate(10);
        }

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


        return view('documents.document_shared_role', compact('documents','users','roles'));
    }

    public function shareDocument(Request $request, $id)
    {
        $share_documents = DB::table('documents_manager')
            //->join('documents_has_roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->join('documents_has_users', 'documents_has_users.document_id', '=', 'documents_manager.id')
            ->join('users', 'documents_has_users.user_id', '=', 'users.id') // Join with the 'users' table
            ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
            //->join('roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->select('documents_manager.*', 'documents_has_users.*', 'users.email as uemail', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name', 'documents_manager.document_url as doc_url', 'documents_manager.description as doc_desc')
            ->latest('documents_manager.created_at')
            ->where('documents_manager.id', $id)
            ->get();

        return response()->json($share_documents);
        /* try {
    $share_documents = DB::table('documents_manager')
        ->join('documents_has_users', 'documents_has_users.document_id', '=', 'documents_manager.id')
        ->join('users', 'documents_has_users.user_id', '=', 'users.id')
        ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
        ->leftJoin('model_has_roles', function ($join) {
            $join->on('model_has_roles.model_id', '=', 'users.id')
                 ->where('model_has_roles.model_type', '=', 'App\User');
        })
        ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->join('documents_has_roles', 'documents_has_roles.document_id', '=', 'documents_manager.id')
        ->select('documents_manager.*', 'documents_has_users.*', 'users.email as uemail', 'users.first_name as firstName', 'users.last_name as lastName', 'roles.name as role_name', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name', 'documents_manager.document_url as doc_url', 'documents_manager.description as doc_desc')
        ->latest('documents_manager.created_at')
        ->where('documents_manager.id', $id)
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
            ->join('documents_manager', 'documents_comments.document_id', '=', 'documents_manager.id')
            ->select('documents_comments.*', 'documents_comments.created_at as createdAt', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_manager.document_url as doc_url')
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
        $users = collect(); // Initialize an empty collection to store users
        $deptids = $request->input('deptid');
        $branchids = $request->input('branchid');


        foreach ($deptids as $deptid) {
            foreach ($branchids as $branchid) {
                // Retrieve users belonging to the selected department and branch



                $users = $users->merge(
                    Staff::where('department_id', $deptid)
                        ->where('branch_id', $branchid)
                        ->join('users','staff.user_id','users.id')
                        ->get()
                );
            }
        }

        return response()->json($users);
    }

    // public function getusersbydept(Request $request)
    // {
    //     $branchid = $request->branchid;

    //     $deptid = $request->deptid;

    //     $users = collect(); // Initialize an empty collection

    //     foreach ($deptid as $key => $value) {
    //         $branchIds = (array) $branchid[$key]; // Ensure $branchid[$key] is always treated as an array
    //         $users = $users->merge(Staff::where('department_id', $value)
    //             ->join('users', 'users.id', 'staff.user_id')
    //             ->where('staff.branch_id', $branchIds)
    //             ->get());
    //     }

    //     return response()->json($users);
    // }




    public function documentsByUsers()
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        $documents = $this->documentRepository->paginate(10);

        return view('documents.document_user', compact('documents'));
    }

    public function documentsByRole(Request $request)
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        $documents = $this->documentHasRoleRepository->paginate(10);

        return view('documents.document_role', compact('documents'));
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
     * Show the form for creating a new Memo.
     */
    public function create()
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


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
        //$users->prepend('Select user', '');
        $dept = Department::all();
        // dd($dept);
        $office = Branch::all();


        return view('documents.create', compact(['categories', 'users', 'roles', 'dept', 'office']));
    }

    public function shareUser(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();

        /* $document = DocumentHasUser::where('document_id', $request->shareuser_id)->first();
        if($document){
        $document->start_date = $request->start_date;
        $document->end_date = $request->end_date;
        $document->is_download = $request->is_download;
        $document->save();
        } */

        //$document = DocumentHasUser::where('document_id', $request->shareuser_id)->first();

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


                $this->documentHasUserRepository->create($input_fields);

                /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) {
            } */
            }
            //$this->_assignToUsers($users, $document);
        }

        Flash::success('Document shared successfully.');

        return redirect(route('documents_manager.shareduser'));
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

        return redirect(route('documents_manager.sharedrole'));
    }

    /**
     * Store a newly created Memo in storage.
     */
    public function store(CreateDocumentsRequest $request)
    {

        // dd($request->all());
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $user = Auth::user();
        $input = $request->all();
        $input['created_by'] = $user->id;

        // Get folder and its parents. Create if path does not exist
        $path = "documents";




        // Check if document with title exist in the folder
        $title = $input['title']; // Assuming the title is provided in the input array

        // Check if a document with the given title already exists
        $existingDocument = Documents::where('title', $title)->first();

        if ($existingDocument !== null) {
            // Document with the same title already exists
            Flash::error('Document with the same name already exists');
            return redirect()->back();
        }


        // Prepare document input
        $document_input = [];


        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];

        if(isset( $input['category_id'])){

            $document_input['category_id'] = $input['category_id'];
        }
        $document_input['created_by'] = $user->id;



        $path_folder = public_path($path);
        // Save file
        $file = $request->file('file');
        $title = str_replace(' ', '', $input['title']);
        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);
        $document_url = $path . "/" . $file_name;
        $document_input['document_url'] = $document_url;
        $document = $this->documentRepository->create($document_input);

        DocumentHistory::create([
            'created_by' => $user->id,
            'document_id' => $document->id,
            'document_url' => $document_url,
        ]);

        // Save document version

        // Assign to roles(s)
        $roles = $input['roles'];
        if ($roles != null) {
            $this->_assignToRoles($roles, $document);
        }
        // Assign to user(s)
        $users = $input['users'];
        if ($users != null) {
            $this->_assignToUsers($users, $document);
        }

        // Retrieve meta tags from the request
        $metaTags = $request->input('meta_tags');
        // Iterate over each meta tag and save it to the database
        foreach ($metaTags as $tag) {
            MetaTag::create([
                'name' => $tag,
                'document_id' => $document->id,
                'created_by' => $user->id,
            ]);
        }

        Flash::success('Document saved successfully.');

        return redirect(route('documents_manager.index'));
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

        $doc = Documents::find($request->upload_id);

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

        return redirect(route('documents_manager.index'));
    }

    public function addComment(Request $request)
    {

        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $user = Auth::user();
        $input = $request->all();

        DocumentComment::create([
            'created_by' => $user->id,
            'document_id' => $request->comment_id,
            'comment' => $request->comment,
        ]);


        Flash::success('New comment saved successfully.');

        return redirect(route('documents_manager.index'));
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
        $memo = $this->documentRepository->find($id);

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

            return redirect(route('documents_manager.index'));
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
        $single_doc = DocumentHasUser::where('document_id', $id)->get();
        $single_role = DocumentHasRole::where('document_id', $id)->get();
        $single_metas = MetaTag::where('document_id', $id)->get();

        return view('documents.edit', compact('document', 'categories', 'users', 'roles', 'single_role', 'single_doc', 'single_metas'));
    }

    /**
     * Update the specified Document in storage.
     */
    public function update($id, UpdateDocumentsRequest $request)
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

            return redirect(route('documents_manager.index'));
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


        MetaTag::where('document_id', $document_id)->delete();
        DocumentHasRole::where('document_id', $document_id)->delete();
        DocumentHasUser::where('document_id', $document_id)->delete();

        // Assign to roles(s)
        $roles = $input['roles'];
        if ($roles != null) {
            $this->_assignToRoles($roles, $document);
        }
        // Assign to user(s)
        $users = $input['users'];
        if ($users != null) {
            $this->_assignToUsers($users, $document);
        }

        // Retrieve meta tags from the request
        $metaTags = $request->input('meta_tags');
        // Iterate over each meta tag and save it to the database
        foreach ($metaTags as $tag) {
            MetaTag::create([
                'name' => $tag,
                'document_id' => $document->id,
                'created_by' => $user->id,
            ]);
            /*  $meta_tag = MetaTag::where('document_id', $document_id)->first();
       if ($meta_tag) {
       $meta_tag->created_by = $user->id;
       $meta_tag->name =  $tag;
       $meta_tag->save();
       } */
        }



        Flash::success('Document updated successfully.');

        return redirect(route('documents_manager.index'));
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

            return redirect(route('documents_manager.index'));
        }

        $this->documentRepository->delete($id);
        $document_history = DocumentHistory::where('document_id', $id)->delete();
        MetaTag::where('document_id', $id)->delete();
        DocumentHasRole::where('document_id', $id)->delete();
        DocumentHasUser::where('document_id', $id)->delete();


        Flash::success('Document deleted successfully.');

        return redirect(route('documents_manager.index'));
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

            /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) {
            } */
        }
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

            $document_has_user = DocumentHasUser::where('document_id', $document->id)->first();
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

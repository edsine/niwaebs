<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use App\Models\User;
use Modules\HRMSystem\Models\Transfer;
use Modules\Accounting\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class TransferController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('manage transfer'))
        {
            if(Auth::user()->hasRole('super-admin')){
                $transfers = Transfer::get();
            }else if(Auth::user()->hasRole('user'))
            {
                $emp       = User::where('id', '=', Auth::user()->id)->first();
                $transfers = Transfer::where('created_by', '=', Auth::user()->creatorId())->where('employee_id', '=', $emp->id)->get();
            }
            else
            {
                $transfers = Transfer::where('created_by', '=', Auth::user()->creatorId())->get();
            }

            return view('hrmsystem::transfer.index', compact('transfers'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create transfer'))
        {
            $departments = Department::get()->pluck('name', 'id');
            $branches    = Branch::get()->pluck('branch_name', 'id');
            $employees = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');

            return view('hrmsystem::transfer.create', compact('employees', 'departments', 'branches'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {

        if(Auth::user()->can('create transfer'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'employee_id' => 'required',
                                   'branch_id' => 'required',
                                   'department_id' => 'required',
                                   'transfer_date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $transfer                = new Transfer();
            $transfer->employee_id   = $request->employee_id;
            $transfer->branch_id     = $request->branch_id;
            $transfer->department_id = $request->department_id;
            $transfer->transfer_date = $request->transfer_date;
            $transfer->description   = $request->description;
            $transfer->created_by    = Auth::user()->creatorId();
            $transfer->save();

            $setings = Utility::settings();
            if($setings['transfer_sent'] == 1)
            {
                $employee             = User::find($transfer->employee_id);
                $branch               = Branch::find($transfer->branch_id);
                $department           = Department::find($transfer->department_id);
                $transfer->name       = $employee->name;
                $transfer->email      = $employee->email;
                $transfer->branch     = $branch->name;
                $transfer->department = $department->name;
//                dd($transfer);

                $transferArr = [
                    'transfer_name'=>$employee->name,
                    'transfer_email'=>$employee->email,
                    'transfer_date'=>$transfer->transfer_date,
                    'transfer_department'=>$transfer->department,
                    'transfer_branch'=>$transfer->branch,
                    'transfer_description'=>$transfer->description,
                ];

                $resp = Utility::sendEmailTemplate('transfer_sent', [ $employee->email], $transferArr);


                return redirect()->route('transfer.index')->with('success', __('Transfer  successfully created.') .(($resp['is_success'] == false && !empty($resp['error'])) ? '<br> <span class="text-danger">' . $resp['error'] . '</span>' : ''));
            }
            return redirect()->route('transfer.index')->with('success', __('Transfer  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Transfer $transfer)
    {
        return redirect()->route('transfer.index');
    }

    public function edit(Transfer $transfer)
    {
        if(Auth::user()->can('edit transfer'))
        {
            $departments = Department::get()->pluck('name', 'id');
            $branches    = Branch::get()->pluck('branch_name', 'id');
            $employees = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');
            if($transfer->created_by == Auth::user()->creatorId())
            {
                return view('hrmsystem::transfer.edit', compact('transfer', 'employees', 'departments', 'branches'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Transfer $transfer)
    {
        if(Auth::user()->can('edit transfer'))
        {
            if($transfer->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [
                                       'employee_id' => 'required',
                                       'branch_id' => 'required',
                                       'department_id' => 'required',
                                       'transfer_date' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $transfer->employee_id   = $request->employee_id;
                $transfer->branch_id     = $request->branch_id;
                $transfer->department_id = $request->department_id;
                $transfer->transfer_date = $request->transfer_date;
                $transfer->description   = $request->description;
                $transfer->save();

                return redirect()->route('transfer.index')->with('success', __('Transfer successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Transfer $transfer)
    {
        if(Auth::user()->can('delete transfer'))
        {
            if($transfer->created_by == Auth::user()->creatorId())
            {
                $transfer->delete();

                return redirect()->route('transfer.index')->with('success', __('Transfer successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}

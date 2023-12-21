<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Modules\HRMSystem\Models\Loan;
use Modules\HRMSystem\Models\LoanOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoanController extends AppBaseController
{
    public function loanCreate($id)
    {
        $employee = User::find($id);
        $loan_options      = LoanOption::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
        $loan =loan::$Loantypes;

        return view('hrmsystem::loan.create', compact('employee','loan_options','loan'));
    }

    public function store(Request $request)
    {

        if(Auth::user()->can('create loan'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'employee_id' => 'required',
                                   'loan_option' => 'required',
                                   'title' => 'required',
                                   'amount' => 'required',
                                   'reason' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $loan              = new Loan();
            $loan->employee_id = $request->employee_id;
            $loan->loan_option = $request->loan_option;
            $loan->title       = $request->title;
            $loan->amount      = $request->amount;
            $loan->type        = $request->type;
            $loan->reason      = $request->reason;
            $loan->created_by  = Auth::user()->creatorId();
            $loan->save();

            return redirect()->back()->with('success', __('Loan  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Loan $loan)
    {
        return redirect()->route('commision.index');
    }

    public function edit($loan)
    {
        $loan = Loan::find($loan);
        if(Auth::user()->can('edit loan'))
        {
            if($loan->created_by == Auth::user()->creatorId())
            {
                $loan_options = LoanOption::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
                $loans =loan::$Loantypes;
                return view('hrmsystem::loan.edit', compact('loan', 'loan_options','loans'));
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

    public function update(Request $request, Loan $loan)
    {
        if(Auth::user()->can('edit loan'))
        {
            if($loan->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [

                                       'loan_option' => 'required',
                                       'title' => 'required',
                                       'amount' => 'required',
                                       'reason' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
                $loan->loan_option = $request->loan_option;
                $loan->title       = $request->title;
                $loan->type        = $request->type;
                $loan->amount      = $request->amount;
                $loan->reason      = $request->reason;
                $loan->save();

                return redirect()->back()->with('success', __('Loan successfully updated.'));
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

    public function destroy(Loan $loan)
    {
        if(Auth::user()->can('delete loan'))
        {
            if($loan->created_by == Auth::user()->creatorId())
            {
                $loan->delete();

                return redirect()->back()->with('success', __('Loan successfully deleted.'));
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

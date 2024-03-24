<?php

namespace App\Http\Controllers;

use App\Models\Reminder;

use App\Models\Reminderuser;
use App\Models\User;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function loginaudit()
    {
        return view('dms.loginaudit');
    }
    public function dashboard()
    {
        // return view('dms.dashboard');
        $result = \DB::select(\DB::raw('SELECT COUNT(name) AS num, name FROM documents_categories GROUP BY name'));
       $data="";
       foreach ($result as $values) {
        $data .="['".$values->name."',  ".$values->num."],";
        # code...
       }
        $alldata= $data;
        // dd($data);
        return view('dms.dashboard2',compact('alldata'));
    }
    public function index(Request $request)
    {
        $data = Reminder::get();
        // if($request->ajax()){
        //     dd('yes ajax');
        //   return response('the ajact call yess sss');

        // }
        return view('dms.reminder', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get()->pluck('first_name', 'id');

        // dd($users);
        $freq = [
            '' => '--None--',
            'Daily' => 'Daily',
            'Weekly' => 'Weekly',
            'Monthly' => 'Monthly',
            'Quartely' => 'Quartely',
            'Half Yearly' => 'Half Yearly',
            'Yearly' => ' Yearly',

        ];
        return view('dms.createreminder', compact('freq', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Reminder;

        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->reminderstart_date = $request->reminderstart_date;

        if ($request->reminderend_date !== null) {

            $data->reminderend_date = $request->reminderend_date;
        }
        if ($request->frequency !== null) {

            $data->frequency = $request->frequency;
        }

        $data->save();

        $users = $request->user_id;
        if ($users !== null) {

            foreach ($users as $key => $value) {
                # code...
                Reminderuser::create(
                    [

                        'reminder_id' => $data->id,
                        'user_id' => $value,
                    ]

                );
            }
        }

        return redirect()->route('reminder.index')->with('success', 'Reminder Set Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

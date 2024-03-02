<?php

namespace App\Http\Controllers;

use App\Models\r;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Accounting\Models\Utility;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($view = 'grid')
    {
        // if(\Auth::user()->can('manage project'))
        // {
        //     return view('projects.index', compact('view'));
        // }
        // else
        // {
        //     return redirect()->back()->with('error', __('Permission Denied.'));
        // }

        // $users= User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '!=', 'client')->get()->pluck('first_name', 'id');
        $users = User::where('type', '!=', 'client')->get()->pluck('first_name', 'id');
        // $clients = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'client')->get()->pluck('first_name', 'id');
        $clients = User::where('type', '=', 'client')->get()->pluck('first_name', 'id');
        $clients->prepend('Select Client', '');
        $users->prepend('Select User', '');
        $status = [
            'in progress' => 'in progress',
            'on hold' => 'on hold',
            'completed' => 'completed',
            'canceled' => 'canceled',
        ];

        $project = Project::get();

        return view('projects.index', compact('clients', 'users', 'status', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->can('create project')) {
            $users   = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '!=', 'client')->get()->pluck('name', 'id');
            $clients = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'client')->get()->pluck('name', 'id');
            $clients->prepend('Select Client', '');
            $users->prepend('Select User', '');
            return view('projects.create', compact('clients', 'users'));
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



            $validator = \Validator::make(
                $request->all(),
                [
                    'project_name' => 'required',
                    'project_image' => 'required',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->with('error', Utility::errorFormat($validator->getMessageBag()));
            }
            $project = new Project();
            $project->project_name = $request->project_name;
            $project->start_date = date("Y-m-d H:i:s", strtotime($request->start_date));
            $project->end_date = date("Y-m-d H:i:s", strtotime($request->end_date));
            if ($request->hasFile('project_image')) {
                $imageName = time() . '.' . $request->project_image->extension();
                $request->file('project_image')->storeAs('projects', $imageName);
                $project->project_image      = 'projects/' . $imageName;
            }
            $project->client_id = $request->client;
            $project->budget = !empty($request->budget) ? $request->budget : 0;
            $project->description = $request->description;
            $project->status = $request->status;
            $project->estimated_hrs = $request->estimated_hrs;
            $project->tags = $request->tag;
            $project->created_by = \Auth::user()->id;
            $project['copylinksetting']   = '{"member":"on","milestone":"off","basic_details":"on","activity":"off","attachment":"on","bug_report":"on","task":"off","tracker_details":"off","timesheet":"off" ,"password_protected":"off"}';

            $project->save();
            if (\Auth::user()->type == 'company') {

                ProjectUser::create(
                    [
                        'project_id' => $project->id,
                        'user_id' => Auth::user()->id,
                    ]
                );

                if ($request->user) {
                    foreach ($request->user as $key => $value) {
                        ProjectUser::create(
                            [
                                'project_id' => $project->id,
                                'user_id' => $value,
                            ]
                        );
                    }
                }
            } else {
                ProjectUser::create(
                    [
                        'project_id' => $project->id,
                        'user_id' => Auth::user()->id,
                    ]
                );

                ProjectUser::create(
                    [
                        'project_id' => $project->id,
                        'user_id' => Auth::user()->id,
                    ]
                );

                if ($request->user) {
                    foreach ($request->user as $key => $value) {
                        ProjectUser::create(
                            [
                                'project_id' => $project->id,
                                'user_id' => $value,
                            ]
                        );
                    }
                }
            }

            //For Notification
            $setting  = Utility::settings(\Auth::user()->id);
            $projectNotificationArr = [
                'project_name' => $request->project_name,
                'user_name' => \Auth::user()->first_name,
            ];
            //Slack Notification
            if (isset($setting['project_notification']) && $setting['project_notification'] == 1) {
                Utility::send_slack_msg('new_project', $projectNotificationArr);
            }

            //Telegram Notification
            if (isset($setting['telegram_project_notification']) && $setting['telegram_project_notification'] == 1) {
                Utility::send_telegram_msg('new_project', $projectNotificationArr);
            }
            //webhook
            $module = 'New Project';
            $webhook =  Utility::webhookSetting($module);
            if ($webhook) {
                $parameter = json_encode($project);
                $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
                if ($status == true) {
                    return redirect()->back()->with('success', __('Project Add Successfully!'));
                } else {
                    return redirect()->back()->with('error', __('Webhook call failed.'));
                }
            }

            return redirect()->route('projects.index')->with('success', __('Project Add Successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(r $r)
    {
        //
    }
}

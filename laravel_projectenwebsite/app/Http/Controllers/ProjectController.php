<?php

namespace App\Http\Controllers;

use Auth;
use App\Groups;
use App\Projects;
use App\Smartcriteria;
use App\Students;
use App\Users;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function createProject(){
        $user = Auth::user();
        $groupid = Students::find((int)$user['id'])->value('group_id');
        $teachers = Users::rightJoin('teachers', 'users.id', '=', 'teachers.id')->get();

        if($groupid != NULL){
          //user already belongs to group
          $group = Users::rightJoin('students', 'users.id', '=', 'students.id')->where('group_id', $groupid)->get();
          $projectid = Groups::where('id', $groupid)->value('project_id');
          $project = Projects::find($projectid);
        }
        else{
          //create new project
          $project = new Projects;
          $group = new Groups;
        }
        echo $project;
        echo $group;
        return view('welcome',[
          'project'  => $project,
          'group' => $group,
          'teachers*' => $teachers,
          'user' => $user
        ]);
    }
    public function saveProject(Request $request){
      $user = Auth::user();
      $groupid = Students::find((int)$user['id'])->value('group_id');

      if($groupid!=NULL){
        //update project
        $projectid = Groups::where('id', $groupid)->value('project_id');
        $updateProject = [
          'title' => $request->title,
          'short_description' => $request->short_description,
          'full_description' => $request->full_description,
          'teacher_id' => $request->teacher_id

        ];
        Projects::find($projectid)->update($updateProject);
        $updateSmartCriteria = [
          'specific' => $request->specific,
          'measurable' => $request->measurable,
          'acceptable' => $request->acceptable,
          'realistic' => $request->realistic,
          'tolerant' => $request->tolerant
        ];
        Smartcriteria::find($projectid)->update($updateSmartCriteria);

      }
      else{
        //create project and create group
        $project = new Projects;
        //['id', 'title', 'status', 'short_description', 'full_description', 'teacher_id', 'creator_id',];
        $project->title = $request->title;
        $project->short_description = $request->short_description;
        $project->full_description = $request->full_description;
        $project->teacher_id = $request->teacher_id;
        $project->creator_id = $user['id'];


        if($request->title != NULL && $request->short_description != NULL && $request->full_description != NULL && $request->specific != NULL && $request->measurable != NULL && $request->acceptable != NULL && $request->realistic != NULL && $request->tolerant != NULL){
          //everything filled in
          $project->status = 'Pending';
        }
        else {
          $project->status = NULL;
        }
        $project->save();
        $smartcriteria = new Smartcriteria;
        //['group_id', 'specific', 'measurable', 'acceptable', 'realistic', 'tolerant',];
        $smartcriteria->specific = $request->specific;
        $smartcriteria->measurable = $request->measurable;
        $smartcriteria->acceptable = $request->acceptable;
        $smartcriteria->realistic = $request->realistic;
        $smartcriteria->tolerant = $request->tolerant;
        $projectid = Project::where('creator_id', $user['id'])->value('id');
        $group = new Groups;
        $group = [
          'project_id' => $projectid
        ];
        $group->save();
      }
    }
    public function sendMemberRequest(Request $request){
      $user = Auth::user();
      $student=Students::find($user['id']);
      $updateStudent = [
        'group_id' => $request->group_id,
        'confirmed'=> FALSE
      ]
      $student->update($updateStudent);
      return redirect('/');
    }
    public function addMember(Request $request){
      $user = Auth::user();
      $newMember = Students::first($request->selected_userid);
      if (Students::first($user['id'])->value('group_id') == $newMember['group_id']) {
        //securitycheck to see if authenticated user can only accept or deny members that want to join te same group.
        if ($request->answer == 'accept') {
          Students::find($request->selected_userid)->update(['confirmed'=> TRUE]);
        }
        else {
          Students::find($request->selected_userid)->update(['group_id'=> NULL]);
        }
      }



    }

}

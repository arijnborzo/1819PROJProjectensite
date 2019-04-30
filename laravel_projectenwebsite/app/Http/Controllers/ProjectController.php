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
    public function loadProject(){
        $user = Auth::user();
        $groupid = Students::find((int)$user['id'])->value('group_id');
        $teachers = Users::rightJoin('students', 'users.id', '=', 'students.id')->get();

        if($groupid! = NULL){
          $group = Users::rightJoin('students', 'users.id', '=', 'students.id')->where('group_id', $groupid)->get();
          $projectid = Groups::where('id', $groupid)->value('project_id');
          $project = Projects::find($projectid);
        }
        else{
          $project = new Projects;
          $groups = new Groups;
        }
        echo $project;
        echo $group;
        return view('welcome',[
          'project'  => $project,
          'group' => $group,
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
          'title' = $request->title,
          'short_description' = $request->short_description,
          'full_description' = $request->full_description,
          'teacher_id' = $request->teacher_id

        ];
        Projects::find($projectid)->update($updateProject);


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

        }
        $project->save();
        $smartcriteria = new Smartcriteria;
        //['group_id', 'specific', 'measurable', 'acceptable', 'realistic', 'tolerant',];
        $smartcriteria->specific = $request->specific;
        $smartcriteria->measurable = $request->measurable;
        $smartcriteria->acceptable = $request->acceptable;
        $smartcriteria->realistic = $request->realistic;
        $smartcriteria->tolerant = $request->tolerant;
        $groups = new Groups;
      }
    }
}

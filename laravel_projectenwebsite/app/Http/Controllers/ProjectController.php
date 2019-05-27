<?php

namespace App\Http\Controllers;

use Auth;
use App\Group;
use App\Project;
use App\Smartcriterium;
use App\Student;
use App\Teacher;
use App\User;
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
        //$this->middleware('belbin');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function newProject(){
        $user = Auth::user();
        $teachers = Teacher::get();
        foreach ($teachers as $key => $teacher) {
          $teacher_list[$key] = $teacher->user;
        }
        if($user->student->group->id != NULL){
          //user already belongs to group
          $project = $user->student->group->project;
          $smartcriteria = $project->smartcriterium;
        }
        else{
          //create new project
          $project = new Project;
          $smartcriteria = new Smartcriterium;
        }
        return view('nieuwproject',
            [
          'project'  => $project,
          'smartcriteria' => $smartcriteria,
          'teachers' => $teacher_list,
          'user' => $user
        ]);
    }
    public function saveProject(Request $request){
      $user = Auth::user();
      $groupid = Student::find((int)$user['id'])->value('group_id');
      var_dump($request->all());
      /*if($groupid!=NULL){
        //update project
        $projectid = Group::where('id', $groupid)->value('project_id');
        $updateProject = [
          'title' => $request->title,
          'short_description' => $request->short_description,
          'full_description' => $request->full_description,
          'teacher_id' => $request->teacher_id

        ];
        Project::find($projectid)->update($updateProject);
        $updateSmartCriteria = [
          'specific' => $request->specific,
          'measurable' => $request->measurable,
          'acceptable' => $request->acceptable,
          'realistic' => $request->realistic,
          'tolerant' => $request->tolerant
        ];
        Smartcriterium::find($projectid)->update($updateSmartCriteria);
        
      }
      else{
        //create project and create group
        $project = new Project;
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
        $smartcriterium = new Smartcriterium;
        //['group_id', 'specific', 'measurable', 'acceptable', 'realistic', 'tolerant',];
        $smartcriterium->specific = $request->specific;
        $smartcriterium->measurable = $request->measurable;
        $smartcriterium->acceptable = $request->acceptable;
        $smartcriterium->realistic = $request->realistic;
        $smartcriterium->tolerant = $request->tolerant;
        $projectid = Project::where('creator_id', $user['id'])->value('id');
        $group = new Groups;
        $group = [
          'project_id' => $projectid
        ];
        $group->save();
      }*/
      //return redirect('/');
    }
    public function sendMemberRequest(Request $request){
      $user = Auth::user();
      $student=Student::find($user['id']);
      $updateStudent = [
        'group_id' => $request->group_id,
        'confirmed'=> FALSE
      ];
      $student->update($updateStudent);
      return redirect()->route('home');
    }

    public function addMember(Request $request){
      $user = Auth::user();
      $newMember = Student::first($request->selected_userid);
      if (Student::first($user['id'])->value('group_id') == $newMember['group_id']) {
        //securitycheck to see if authenticated user can only accept or deny members that want to join te same group.
        if ($request->answer == 'accept') {
          Student::find($request->selected_userid)->update(['confirmed'=> TRUE]);
        }
        else {
          Student::find($request->selected_userid)->update(['group_id'=> NULL]);
        }
      }
    }
    public function detail($id)
    {
        $user = Auth::user();
        $detailProject = Project::where('id', $id)->first();
        $belongstoproject = FALSE;
        if(isset($user->student->group->id)){
            $myProject = Project::where('id' ,$user->student->group->project->id)->first();
            if ($myProject->id === $detailProject->id)
            {
                $belongstoproject = TRUE;
            }
        }
        $smart = Smartcriterium::where('project_id', $id)->get();
        $teacher =Project::find($id)->teacher->user;
        $group = Group::where('project_id', $detailProject->id)->first();
        $students = Student::where('group_id', $group->id)->get();

        $groupmembers=[];
        foreach ($students as $student) {
            $s = [];
            array_push($s, $student->belbintype, $student->user);
            //echo $student;
            array_push($groupmembers, $s);
        }
        return view('detail',
            [
            'project' => $detailProject,
            'smart' => $smart,
            'groupmembers' => $groupmembers,
            'teacher' => $teacher,
            'user' => $user,
            'belongstoproject' => $belongstoproject,
        ]);
    }
    public function myProject()
    {
        $user = Auth::user();
        $newpath = substr_replace("/project/", $user->student->group->project->id,9);
        return redirect($newpath);
    }

}

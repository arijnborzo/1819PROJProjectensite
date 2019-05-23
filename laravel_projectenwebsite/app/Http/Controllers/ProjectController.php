<?php

namespace App\Http\Controllers;

use Auth;
use App\Group;
use App\Project;
use App\Smartcriterium;
use App\Student;
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
    public function createProject(){
        $user = Auth::user();
        $groupid = Student::find((int)$user['id'])->value('group_id');
        $teachers = User::rightJoin('teachers', 'users.id', '=', 'teachers.id')->get();

        if($groupid != NULL){
          //user already belongs to group
          $group = User::rightJoin('students', 'users.id', '=', 'students.id')->where('group_id', $groupid)->get();
          $projectid = Group::where('id', $groupid)->value('project_id');
          $project = Project::find($projectid);
        }
        else{
          //create new project
          $project = new Project;
          $group = new Group;
        }
        echo $project;
        echo $group;
        return view('nieuwproject',[
          'project'  => $project,
          'group' => $group,
          'teachers' => $teachers,
          'user' => $user
        ]);
    }
    public function saveProject(Request $request){
      $user = Auth::user();
      $groupid = Student::find((int)$user['id'])->value('group_id');

      if($groupid!=NULL){
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
      }
    }
    public function sendMemberRequest(Request $request){
      $user = Auth::user();
      $student=Student::find($user['id']);
      $updateStudent = [
        'group_id' => $request->group_id,
        'confirmed'=> FALSE
      ];
      $student->update($updateStudent);
      return redirect('/');
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
        $myProject = Project::where('id' , $user->student->group->project->id)->first();
        $detailProject = Project::where('id', $id)->first();
        $smart = Smartcriterium::where('project_id', $id)->get();
        $teacher =Project::find($id)->teacher->user;
        $group = Group::where('project_id', $detailProject->id)->first();
        $students = Student::where('group_id', $group->id)->get();
        $groupmembers=[];
        foreach ($students as $student) {
            array_push($groupmembers, $student->user->surname . " " . $student->user->name . " " . $student->belbintype);
        }
        var_dump($groupmembers);
        $belongstoproject = FALSE;
        if ($myProject === $detailProject)
        {
            $belongstoproject = TRUE;
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
        $myProject = Project::where('id' , $user->student->group->project->id)->first();
        $smart = Smartcriterium::where('project_id', $myProject->id)->get();
        $teacher =Project::find($myProject->id)->teacher->user;
        $group = Group::where('project_id', $myProject->id)->first();
        $students = Student::where('group_id', $group->id)->get();
        $groupmembers=[];
        foreach ($students as $student) {
            array_push($groupmembers, $student->user->surname . " " . $student->user->name . " " . $student->belbintype);
        }
        var_dump($groupmembers);
        $belongstoproject = TRUE;
        return view('detail',
            [
                'project' => $myProject,
                'smart' => $smart,
                'groupmembers' => $groupmembers,
                'teacher' => $teacher,
                'user' => $user,
                'belongstoproject' => $belongstoproject,
            ]);
    }

}

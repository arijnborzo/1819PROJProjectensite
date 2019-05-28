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
//        dd($teachers);
        foreach ($teachers as $key => $teacher) {
            $teacher_list[$key] = $teacher->user;
        }
        if(isset($user->student->group)){
            //user already belongs to group
            $project = $user->student->group->project;
            $smartcriteria = $project->smartcriterium;
        }
        else{
            //create new project
            $project = new Project;
            $smartcriteria = new Smartcriterium;
        }
        if ($project->status == "Accepted"){
            return redirect('/');
        } else{
            return view('nieuwproject',
                [
                    'project'  => $project,
                    'smartcriteria' => $smartcriteria,
                    'teachers' => $teacher_list,
                    'user' => $user
                ]);
        }

    }
    public function saveProject(Request $request){
        $user = Auth::user();
        if(isset($user->student->group)){
            $group=$user->student->group;
            //update project
            $projectid = $group->project->id;
            $updateProject = [
                'title' => $request->titel,
                'short_description' => $request->kortebeschrijving,
                'full_description' => $request->langebeschrijving,
                'main_question' => $request->hoofdvraag,
                'side_questions' => $request->nevenvragen,
                'teacher_id' => $request->docent,
                'status' => "Pending"

            ];
            Project::find($projectid)->update($updateProject);
            $updateSmartCriteria = [
                'specific' => $request->specifiek,
                'measurable' => $request->meetbaar,
                'acceptable' => $request->acceptabel,
                'realistic' => $request->realiseerbaar,
                'tolerant' => $request->tijdsgebonden
            ];
            Smartcriterium::where('project_id',$projectid)->update($updateSmartCriteria);

        }
        else{
            //create project and create group
            $project = new Project;
            //['id', 'title', 'status', 'short_description', 'full_description', 'teacher_id', 'creator_id',];
            $project->title = $request->titel;
            $project->short_description = $request->kortebeschrijving;
            $project->full_description = $request->langebeschrijving;
            $project->main_question = $request->hoofdvraag;
            $project->side_questions = $request->nevenvragen;
            $project->status = "Pending";
            $project->teacher_id = $request->docent;
            $project->creator_id = $user['id'];
            if($request->titel != NULL && $request->korte_beschrijving != NULL && $request->lange_beschrijving != NULL && $request->specifiek != NULL && $request->meetbaar != NULL && $request->acceptabel != NULL && $request->realiseerbaar != NULL && $request->tijdsgebonden != NULL){
                //everything filled in
                $project->status = 'Pending';
            }
            else {
                $project->status = NULL;
            }
            $project->save();
            $projectid = Project::where('creator_id', $user['id'])->value('id');
            echo($projectid);
            $newsmartcriterium = [
                'project_id' => (int)$projectid,
                'specific' => $request->specifiek,
                'measurable' => $request->meetbaar,
                'acceptable' => $request->acceptabel,
                'realistic' => $request->realiseerbaar,
                'tolerant' => $request->tijdsgebonden
            ];
            $smartcriterium = new Smartcriterium($newsmartcriterium);
            $smartcriterium->save();
            if (isset($user->student)){
                $group = new Group(['project_id' => $projectid]);
                $group->save();
                echo(Group::where('project_id',$projectid)->value('id'));
                $creator = [
                    'group_id' => Group::where('project_id',$projectid)->value('id'),
                    'confirmed' => TRUE,
                ];
                Student::find($user->id)->update($creator);
            }
        }
        return redirect('/');
    }

    public function detail($id)
    {
        $isStudent = TRUE;
        if (isset(Teacher::find(Auth::user()->id)->id)){
            $isStudent = FALSE;
        }
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
        if (isset(Project::find($id)->teacher)){
            $teacher =Project::find($id)->teacher->user;
        } else {
            $teacher = new Teacher();
        }

        $group = Group::where('project_id', $detailProject->id)->first();
        $students = Student::where('group_id', $group->id)->get();

        $groupmembers=[];
        foreach ($students as $student) {
            $s = [];
            array_push($s, $student->belbintype, $student->user, $student->confirmed);
            //echo $student;
            array_push($groupmembers, $s);
        }
        return view('detail',
            [
                'isStudent' => $isStudent,
                'project' => $detailProject,
                'smart' => $smart,
                'groupmembers' => $groupmembers,
                'teacher' => $teacher,
                'user' => $user,
                'belongstoproject' => $belongstoproject,
                'confirmed' => $user->student->confirmed
            ]);
    }
    public function myProject()
    {
        $user = Auth::user();
        $newpath = substr_replace("/project/", $user->student->group->project->id,9);
        return redirect($newpath);
    }

}

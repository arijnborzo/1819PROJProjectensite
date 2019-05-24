<?php

namespace App\Http\Controllers;

use Auth;
use App\Group;
use App\Project;
use App\Student;
use App\Teacher;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class OverviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('belbin');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $year = date("Y"); //-1
        $archief = false;
        $AllProjects=Project::all();
        foreach ($AllProjects as $key=>$project) {
            $group = Group::where('project_id', $project->id)->first();
            $students = Student::where('group_id', $group->id)->get();
            $members=[];
            foreach ($students as $student) {
                array_push($members, $student->user->surname . " " . $student->user->name);
            }
            $groupmembers[$project->id] = $members;
        }

        return view('overzicht',
            [
                'projects' => $AllProjects,
                'groupmembers' => $groupmembers,
                'user' => $user,
                'archief' => $archief,
                'year' => $year
            ]);

    }
    public function archive()
    {
        $user = Auth::user();
        $year = date("Y"); //-1
        $archief = true;
        $AllProjects=Project::all();
        foreach ($AllProjects as $key=>$project) {
            $group = Group::where('project_id', $project->id)->first();
            $students = Student::where('group_id', $group->id)->get();
            $members=[];
            foreach ($students as $student) {
                array_push($members, $student->user->surname . " " . $student->user->name);
            }
            $groupmembers[$project->id] = $members;
        }
        return view('overzicht',
            [
                'projects' => $AllProjects,
                'groupmembers' => $groupmembers,
                'user' => $user,
                'archief' => $archief,
                'year' => $year
            ]);

    }

    public function students()
    {
      $user = Auth::user();
      $students = Student::pluck('id');;
      $all=[];
      foreach ($students as $id) {
            $members=[];
            $used = User::where('id', $id)->first();
            $student = Student::where('id', $id)->first();
            $project = Project::where('id', $student->group_id)->first();
            $stu = $used->surname . " " . $used->name;
            $belbin = $used->student->belbintype;
            $projects = $project->title;
            array_push($members, $stu, $belbin, $projects);
            array_push($all, $members);
      }

      return view('students',
          [
              'students' => $all,
              'user' => $user
          ]
        );
    }
}

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
         //$this->middleware('belbin');
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
        $all = $this->getAlInfo();
        return view('overzicht',
            [
                'groupmembers' => $all,
                'user' => $user,
                'archief' => $archief,
                'year' => $year
            ]);

    }
    private function getAlInfo(){
        $AllProjects=Project::all();
        $all=[];
        foreach ($AllProjects as $key=>$project) {
            $group = Group::where('project_id', $project->id)->first();
            $students = Student::where('group_id', $group->id)->get();
            $members=[];
            $info=[];
            foreach ($students as $student) {
                array_push($members, $student->user->surname . " " . $student->user->name);
            }
            array_push($info, $members, $project);
            array_push($all, $info);
        }
        return $all;
    }
    public function archive()
    {
        $user = Auth::user();
        $year = date("Y"); //-1
        $archief = true;
        $all = $this->getAlInfo();
        return view('overzicht',
            [
                'groupmembers' => $all,
                'user' => $user,
                'archief' => $archief,
                'year' => $year
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
            $group = Group::where('project_id', $student->group_id)->first();
            $group_id = $group->id;

            array_push($members, $stu, $belbin, $projects, $group_id);
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

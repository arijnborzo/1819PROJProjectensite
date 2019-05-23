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
        $AllProjects=Project::all();
        $groupmembers=[];
        foreach ($AllProjects as $project) {
            $group = Group::where('project_id', $project->id)->first();
            $students = Student::where('group_id', $group->id)->get();
            $members=[];
            foreach ($students as $student) {
                array_push($members, $student->user->surname . " " . $student->user->name);
            }
            array_push($groupmembers, $members);
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
        $groupmembers=[];
        foreach ($AllProjects as $project) {
            $group = Group::where('project_id', $project->id)->first();
            $students = Student::where('group_id', $group->id)->get();
            $members=[];
            foreach ($students as $student) {
                array_push($members, $student->user->surname . " " . $student->user->name);
            }
            array_push($groupmembers, $members);
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
      $students = User::rightJoin('students', 'users.id', '=', 'students.id')
            ->rightJoin('projects', 'students.group_id', '=', 'projects.id')
            ->select('students.group_id','users.name', 'users.surname', 'projects.title as projectvoorstel', 'students.belbintype as belbin')
            ->get();
      //echo $students;
      return view('students', [
          'students' => $students,
             'user' => $user
            ]
        );
    }
}

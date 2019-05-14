<?php

namespace App\Http\Controllers;

use Auth;
use App\Group;
use App\Project;
use App\User;
use App\Student;
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
      $year = date("Y")-1;
      $projects = Project::join('groups', 'projects.id', '=', 'groups.project_id')->join('students', 'students.group_id','=', 'groups.id')->join('users', 'users.id', '=', 'students.id' )->whereYear('projects.created_at', $year)->get();
      echo $projects;
      return view('overzicht', [
        'projects' => $projects,
        'user' => $user
      ]);

    }
    public function archive()
    {
      $user = Auth::user();
      $year = date("Y")-1;
      $projects = Project::whereYear('created_at', '!=', $year)->get();
      echo $projects;
      return view('welcome', [
        'projects' => $projects,
        'user' => $user
      ]);
    }
    public function detailProject($id)
    {
      $user = Auth::user();
      $usergroupid = Student::first($user['id'])->value('group_id');
      $projectgroupid = Group::where('project_id', $id)->value('id');
      if ($usergroupid == $projectgroupid) {
        //user belongs to group of projects
        $belongstoproject = TRUE;
      }
      else {
        $belongstoproject = FALSE;
      }
      return view('detail',[
        'project' => $project,
        'user' => $user,
        'belongstoproject' => $belongstoproject
      ]);
    }
    public function students()
    {
      $user = Auth::user();
      $students = User::rightJoin('students', 'users.id', '=', 'students.id')
            ->rightJoin('projects', 'students.group_id', '=', 'projects.id')
            ->select('students.group_id as groep', 'users.name as naam', 'projects.title as projectvoorstel', 'students.belbintype as belbin')
            ->get();
      return view('students', [
          'students' => $students,
             'user' => $user
            ]
        );
    }
}

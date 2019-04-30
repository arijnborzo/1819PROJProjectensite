<?php

namespace App\Http\Controllers;

use Auth;
use App\Projects;
use App\Users;
use App\Students;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user = Auth::user();
      $belbin = Students::select('belbintype')->find((int)$user['id']);
      if ($belbin['belbintype'] == NULL){
        return redirect('/belbintest');
      }
      else{
        $year = date("Y")-1;
        $projects = Projects::join('groups', 'projects.id', '=', 'groups.project_id')->join('students', 'students.group_id','=', 'groups.id')->join('users', 'users.id', '=', 'students.id' )->whereYear('created_at', $year)->get();
        echo $projects;
        return view('overzicht', [
          'projects' => $projects,
          'user' => $user
        ]);
      }

    }
    public function archive()
    {
      $user = Auth::user();
      $year = date("Y")-1;
      $projects = Projects::whereYear('created_at', '!=', $year)->get();
      echo $projects;
      return view('welcome', [
        'projects' => $projects,
        'user' => $user
      ]);
    }
    public function students()
    {
      $user = Auth::user();
      $students = Users::rightJoin('students', 'users.id', '=', 'students.id')->get();
      echo $students;
      return view('welcome', [
        'students' => $students,
        'user' => $user
      ]);
    }
}

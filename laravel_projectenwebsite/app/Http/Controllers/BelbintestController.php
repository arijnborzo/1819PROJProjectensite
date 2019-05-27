<?php

namespace App\Http\Controllers;

use App\Group;
use App\Project;
use App\Smartcriterium;
use Auth;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class BelbintestController extends Controller
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

    public function addBelbintype($type){
        $user = Auth::user();
        Student::where('id', $user->id)->update(['belbintype' => $type]);
        return redirect('/');
    }
    public function showBelbintest(){
//      $user = Auth::user();
//      Student::where('id', $user->id)->update(['belbintype' => $type]);
        $user = Auth::user();
        $projects = Project::all();
        $all=[];
        foreach ($projects as $project) {
            $s = [];
            $group = Group::where('project_id', $project->id)->first();
            $students = Student::where('group_id', $group->id)->get();
            $members = [];
            foreach ($students as $student){
                $belbin = [];
                array_push($belbin, $student->user->surname . " " . $student->user->name, $student->belbintype);
                array_push($members,$belbin);
            }
            array_push($s, $project->title,$members);
            array_push($all, $s);
        }
        return view('belbin',
            [
                'groupmembers' => $all,
                'user' => $user,
            ]);
    }
}

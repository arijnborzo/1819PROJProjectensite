<?php

namespace App\Http\Controllers;

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
    public function showBelbintest(){
      $user = Auth::user();
      $student = $user->student;
      echo($student->belbintype);
      return view('belbin', [
        'user' => $user
      ]);
    }
    public function addBelbintype($type){
        $user = Auth::user();
        $student = Student::where('id', $user->id)->first();
        echo ($user->id);
        echo ($type);
        Student::where('id', $user->id)->update(['belbintype' => $type]);
      //return redirect('/');
    }
}

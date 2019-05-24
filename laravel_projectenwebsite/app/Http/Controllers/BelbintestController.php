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
      if ($user->student->belbintype != null){
        echo($user->student->belbintype);
        return redirect()->route('home');
      }
      else{
        return view('belbin', [
          'user' => $user
        ]);
      }


    }
    public function addBelbintype($type){
        $user = Auth::user();
        Student::where('id', $user->id)->update(['belbintype' => $type]);
        return redirect('/students');
    }
}

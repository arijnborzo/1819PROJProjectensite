<?php

namespace App\Http\Controllers;

use Auth;
use App\Students;
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
      return view('welcome', [
        'user' => $user
      ]);
    }
    public function addBelbintype(Request $request){
      $id = $request['id'];
      $type = $request['type'];
      User::where('id', $id)->update(['belbinbtype' => $type]);
      return redirect('/');
    }
}

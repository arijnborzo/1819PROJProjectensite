<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocentController extends Controller
{
  public function acceptProject($id){
      $user = Auth::user();
      $teacher=Teacher::find($user['id']);
      if (isset($teacher)){
          $project = Project::find($id);
          if ($teacher->id == $project->id){
            $project->update(['status' => 'Accepted']);
          }
      }
      return redirect('/');
  }
  public function rejectProject($id){
      $user = Auth::user();
      $teacher=Teacher::find($user['id']);
      if (isset($teacher)){
          $project = Project::find($id);
          if ($teacher->id == $project->id){
            $project->update(['status' => 'Denied']);
          }
      }
      return redirect('/');
  }
}

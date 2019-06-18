<?php

namespace App\Http\Controllers;
use Auth;
use App\Student;
use App\Group;
use App\Project;
use Illuminate\Http\Request;

class GroupmemberController extends Controller
{
  public function sendMemberRequest($id){
      $user = Auth::user();
      $student=Student::find($user['id']);
      $group=Group::where('project_id',$id)->value('id');
      echo($group);
      $updateStudent = [
          'group_id' => $group,
          'confirmed'=> 0,
          'created_at' => date("Y-m-d H:i:s"),
      ];
      $student->update($updateStudent);
      return redirect('/myproject');
  }

  public function addRemoveMember(Request $request){
      $user = Auth::user();
      $newMember = Student::find($request->user_id);
      if (Student::find($user['id'])->group_id == $newMember['group_id']) {
          //securitycheck to see if authenticated user can only accept or deny members that want to join te same group.
          if ($request->action == 'ACCEPT') {
              echo ('ACCEPT');
              $newMember->update(['confirmed'=> 1]);
          }
          else if($request->action == 'DELETE'){
              echo ('DELETE');
              $newMember->update(['group_id'=> NULL, 'confirmed' => 0]);
          }
      }
      return redirect('/myproject');
  }
}

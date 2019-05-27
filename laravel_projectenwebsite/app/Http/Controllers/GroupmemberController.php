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
          'confirmed'=> FALSE
      ];
      $student->update($updateStudent);
      return redirect('/myproject');
  }

  public function addRemoveMember(Request $request){
      $user = Auth::user();
      $newMember = Student::first($request->selected_userid);
      if (Student::first($user['id'])->value('group_id') == $newMember['group_id']) {
          //securitycheck to see if authenticated user can only accept or deny members that want to join te same group.
          if ($request->answer == 'accept') {
              Student::find($request->selected_userid)->update(['confirmed'=> TRUE]);
          }
          else {
              Student::find($request->selected_userid)->update(['group_id'=> NULL]);
          }
      }
      return redirect('/myproject');
  }
}

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
      //mail($id);
      $updateStudent = [
          'group_id' => $group,
          'confirmed'=> 0,
          'created_at' => date("Y-m-d H:i:s"),
      ];
      $student->update($updateStudent);
      return redirect('/myproject');
  }

  public static function mail($id)
  {
      $user = Auth::user();
      $project = Project::where('id', $id)->first();
      $group = Group::where('project_id', $project->id)->first();
      $students = Student::where('group_id', $group->id)->get();
      $users = [];
      $data =[];
      $i = 0;
      array_push($users, $user);
      foreach ($students as $student){
          array_push($users, User::where('id', $student->id)->first());
      }
      array_push($data, $users, $user, $i, $project);
      foreach ($users as $adres){
          Mail::raw('Dag beste,'."\r\n".'Ik stuur jullie een verzoek om bij '.$project->title. ' aan te sluiten.'."\r\n". 'Alvast bedankt.' ."\r\n".'Groeten'."\r\n".$user->surname. ' '.$user->name,
              function ($message) use ($data)
              {
                  $message->from('projectenwebsite@outlook.com')->to($data[0][$data[2]]->email, $data[0][$data[2]]->surname.' '.$data[0][$data[2]]->name)->subject('Verzoek tot '.$data[3]->title);
              });
          $data[2] = $data[2] + 1;
      }
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

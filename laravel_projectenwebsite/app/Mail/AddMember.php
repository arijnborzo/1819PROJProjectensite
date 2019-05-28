<?php

namespace App\Mail;
use Auth;
use App\Group;
use App\Project;
use App\Smartcriterium;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use PHPMailerAutoload;
//include_once('PHPMailer/src/SMTP.php');

class AddMember extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
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
            Mail::raw('Dag KLOOTZAKKEN.'."\r\n".'Ik stuur jullie een verzoek om bij '.$project->title. 'aan te sluiten.'."\r\n". 'Alvast bedankt.' ."\r\n".'Groeten'."\r\n".$user->surname. ' '.$user->name,
                function ($message) use ($data)
                {
                    $message->from('projectenwebsite@outlook.com')->to($data[0][$data[2]]->email, $data[0][$data[2]]->surname.' '.$data[0][$data[2]]->name)->subject('Verzoek tot '.$data[3]->title);
                });
            $data[2] = $data[2] + 1;
        }
    }
}

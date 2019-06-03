<?php

namespace App\Http\Controllers;

use App\Group;
use App\Project;
use App\Smartcriterium;
use Auth;
use App\Student;
use App\User;
use App\Teacher;
use Illuminate\Http\Request;

class DocentController extends Controller
{
    public function acceptProject($id)
    {
        $user = Auth::user();
        $teacher = Teacher::find($user['id']);
        if (isset($teacher)) {
            $project = Project::find($id);
            $project->update(['status' => 'Accepted']);
        }
        return redirect('/');
    }

    public function denyProject($id)
    {
        $user = Auth::user();
        $teacher = Teacher::find($user['id']);
        if (isset($teacher)) {
            $project = Project::find($id);
            $project->update(['status' => 'Declined']);
        }
        return redirect('/');
    }

    public function pendingProject($id)
    {
        $user = Auth::user();
        $teacher = Teacher::find($user['id']);
        if (isset($teacher)) {
            $project = Project::find($id);
            $project->update(['status' => 'Pending']);
        }
        return redirect('/');
    }
}

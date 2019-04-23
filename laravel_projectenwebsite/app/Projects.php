<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = ['Id', 'Title', 'Status', 'Short_Description', 'Full_Description', 'Teacher_Id', 'Creator_Id',];
    public function teachers(){
        return $this->belongsTo('App\Teachers', 'Id', 'Teacher_Id');
    }
    public function smartcriteria() {
        return $this->hasOne('App\Smartcriteria', 'Group_Id', 'Id');
    }
    public function users(){
        return $this->belongsTo('App\Users', 'Id', 'Creator_Id');
    }
    public function groups(){
        return $this->hasOne('App\Groups', 'Project_Id');
    }
    public function comments(){
        return $this->hasMany('App\Comments', 'Project_Id');
    }
    public $timestamps = true;
}

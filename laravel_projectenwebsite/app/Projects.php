<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = ['id', 'title', 'status', 'short_description', 'full_description', 'teacher_id', 'creator_id',];
    public function teachers(){
        return $this->belongsTo('App\Teachers', 'id', 'teacher_id');
    }
    public function smartcriteria() {
        return $this->hasOne('App\Smartcriteria', 'group_id', 'id');
    }
    public function users(){
        return $this->belongsTo('App\Users', 'id', 'creator_id');
    }
    public function groups(){
        return $this->hasOne('App\Groups', 'project_id');
    }
    public function comments(){
        return $this->hasMany('App\Comments', 'project_id');
    }
    public $timestamps = true;
}

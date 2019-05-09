<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['id', 'title', 'status', 'short_description', 'full_description', 'teacher_id', 'creator_id',];
    public function teachers(){
        return $this->belongsTo('App\Teacher', 'id', 'teacher_id');
    }
    public function smartcriteria() {
        return $this->hasOne('App\Smartcriterium', 'group_id', 'id');
    }
    public function users(){
        return $this->belongsTo('App\User', 'id', 'creator_id');
    }
    public function groups(){
        return $this->hasOne('App\Group', 'project_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment', 'project_id');
    }
    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['id', 'title', 'status', 'short_description', 'full_description', 'teacher_id', 'creator_id',];
    public function teacher(){
        return $this->belongsTo('App\Teacher', 'id', 'teacher_id');
    }
    public function smartcriterium() {
        return $this->hasOne('App\Smartcriterium', 'group_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'id', 'creator_id');
    }
    public function group(){
        return $this->hasOne('App\Group', 'project_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment', 'project_id');
    }
    public $timestamps = true;
}

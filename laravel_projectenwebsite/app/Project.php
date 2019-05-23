<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['id', 'title', 'status', 'short_description', 'full_description', 'teacher_id', 'creator_id',];
    public function teacher(){
        return $this->belongsTo('App\Teacher', 'teacher_id', 'id');
    }
    public function smartcriterium() {
        return $this->hasOne('App\Smartcriterium', 'project_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }
    public function group(){
        return $this->hasOne('App\Group', 'id', 'project_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment', 'project_id');
    }
    public $timestamps = true;
}

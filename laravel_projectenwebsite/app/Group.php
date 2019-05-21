<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $fillable = ['id', 'project_id', ];
  public function students(){
    return $this->hasMany('App\Student');
  }
  public function project(){
    return $this->hasOne('App\Project', 'id', 'project_id');
  }
}

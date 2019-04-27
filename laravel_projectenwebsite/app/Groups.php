<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
  protected $fillable = ['id', 'project_id', ];
  public function students(){
    return $this->hasMany('App\Students');
  }
  public function projects(){
    return $this->hasOne('App\Projects', 'id', 'project_id');
  }
}

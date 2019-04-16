<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
  protected $fillable = ['Id', 'Project_Id', ];
  public function students(){
    return $this->hasMany('App\Students');
  }
  public function projects(){
    return $this->hasOne('App\Projects', 'Id', 'Project_Id');
  }
}

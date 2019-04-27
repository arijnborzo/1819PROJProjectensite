<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
  protected $fillable = ['id', 'name', 'surname', 'email', 'password', ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function students(){
    return $this->hasOne('App\Students');
  }
  public function teachers(){
    return $this->hasOne('App\Teachers');
  }
  public function externs(){
    return $this->hasOne('App\Externs');
  }
  public function comments()  {
      return $this->hasMany('App\Comments', 'User_id');
  }
  public function projects(){
    return $this->hasMany('App\Projects', 'Creator_Id');
  }
  public $timestamps = false;
}

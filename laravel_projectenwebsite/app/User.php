<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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

  public function student(){
    return $this->hasOne('App\Student', 'id');
  }
  public function teacher(){
    return $this->hasOne('App\Teacher', 'id');
  }
  public function extern(){
    return $this->hasOne('App\Extern', 'id');
  }
  public function comments()  {
      return $this->hasMany('App\Comment', 'user_id');
  }
  public function projects(){
    return $this->hasMany('App\Project', 'creator_Id');
  }
  public $timestamps = false;
}

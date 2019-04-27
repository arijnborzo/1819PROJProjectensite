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
    return $this->hasOne('App\Students', 'id');
  }
  public function teachers(){
    return $this->hasOne('App\Teachers', 'id');
  }
  public function externs(){
    return $this->hasOne('App\Externs', 'id');
  }
  public function comments()  {
      return $this->hasMany('App\Comments', 'user_id');
  }
  public function projects(){
    return $this->hasMany('App\Projects', 'creator_Id');
  }
  public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  protected $fillable = ['Id', 'Name', 'Surname', 'Email',];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = ['Password', ];

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
}

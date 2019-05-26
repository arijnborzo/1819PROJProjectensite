<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $fillable = ['id', 'belbintype', 'group_id',];
    public function user(){
      return $this->hasOne('App\User', 'id', 'id');
    }
    public function group(){
      return $this->belongsTo('App\Group', 'group_id', 'id');
    }
    public $timestamps = false;
}

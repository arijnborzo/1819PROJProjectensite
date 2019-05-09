<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id', 'belbintype', 'group_id',];
    public function users(){
      return $this->hasOne('App\User', 'id', 'id');
    }
    public function groups(){
      return $this->belongsTo('App\Group', 'id', 'group_id');
    }
}

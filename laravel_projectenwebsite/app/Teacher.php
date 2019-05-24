<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['id',];
    public function user() {
        return $this->hasOne('App\User', 'id', 'id');
    }
    public function project() {
        return $this->hasMany('App\Project');
    }
    public $timestamps = false;
}

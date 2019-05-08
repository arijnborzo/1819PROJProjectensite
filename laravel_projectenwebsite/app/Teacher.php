<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['id',];
    public function users() {
        return $this->hasOne('App\User');
    }
    public function projects() {
        return $this->hasMany('App\Project');
    }
}

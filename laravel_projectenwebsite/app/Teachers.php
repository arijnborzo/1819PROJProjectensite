<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $fillable = ['Id',];
    public function users() {
        return $this->hasOne('App\Users');
    }
    public function projects() {
        return $this->hasMany('App\Projects');
    }
}

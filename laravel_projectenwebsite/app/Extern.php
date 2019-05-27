<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Extern extends Authenticatable
{
    protected $fillable = ['id'];
    public function user(){
      return $this->hasOne('App\User');
    }
    public $timestamps = false;
}

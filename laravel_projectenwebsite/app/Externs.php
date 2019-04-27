<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Externs extends Model
{
    protected $fillable = ['id', 'companie', ];
    public function users(){
      return $this->hasOne('App\Users');
    }
}

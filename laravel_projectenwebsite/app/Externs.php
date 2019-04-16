<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Externs extends Model
{
    protected $fillable = ['Id', 'Companie', ];
    public function users(){
      return $this->hasOne('App\Users');
    }
}

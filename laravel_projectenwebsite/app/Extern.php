<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extern extends Model
{
    protected $fillable = ['id', 'companie', ];
    public function user(){
      return $this->hasOne('App\User');
    }
}

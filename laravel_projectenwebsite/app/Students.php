<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['id', 'belbintype', 'group_id',];
    public function users(){
      return $this->hasOne('App\Users', 'id', 'id');
    }
    public function groups(){
      return $this->belongsTo('App\Groups', 'id', 'group_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['Id', 'Belbintype', 'Group_Id',];
    public function users(){
      return $this->hasOne('App\Users', 'Id');
    }
    public function groups(){
      return $this->belongsTo('App\Groups', 'Id', 'Group_Id');
    }
}

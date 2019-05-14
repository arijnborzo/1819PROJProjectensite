<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartcriterium extends Model
{
  protected $fillable = ['group_id', 'specific', 'measurable', 'acceptable', 'realistic', 'tolerant',];

  public function group(){
      return $this->hasOne('App\Group', 'Id', 'Group_Id');
  }
}

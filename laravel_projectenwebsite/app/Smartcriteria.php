<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartcriteria extends Model
{
  protected $fillable = ['group_id', 'specific', 'measurable', 'acceptable', 'realistic', 'tolerant',];

  public function groups(){
      return $this->hasOne('App\Groups', 'Id', 'Group_Id');
  }
}

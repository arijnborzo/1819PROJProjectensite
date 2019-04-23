<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartcriteria extends Model
{
  protected $fillable = ['Group_Id', 'Specific', 'Measurable', 'Acceptable', 'Realistic', 'Tolerant',];

  public function groups(){
      return $this->hasOne('App\Groups', 'Id', 'Group_Id');
  }
}

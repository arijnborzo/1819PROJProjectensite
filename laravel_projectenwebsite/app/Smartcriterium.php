<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartcriterium extends Model
{
    protected $fillable = ['project_id', 'specific', 'measurable', 'acceptable', 'realistic', 'tolerant',];

    public function project(){
        return $this->hasOne('App\Project', 'project_id', 'id');
    }
    public $timestamps = false;
}
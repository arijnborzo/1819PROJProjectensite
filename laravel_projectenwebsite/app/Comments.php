<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['Id', 'User_Id', 'Title', 'Message', 'Project_Id',];
    public function users(){
      return $this->belongsTo('App\Users', 'User_id');
    }
    public function projects(){
      return $this->belongsTo('App\Projects', 'Project_Id');
    }
    public $timestamps = true;
}
/**

Schema::create('comments', function (Blueprint $table) {
    $table->increments('Id');
    $table->integer('User_Id');
    $table->string('Title');
    $table->text('Message');
    $table->integer('Project_Id');
    $table->timestamps();
});

*/

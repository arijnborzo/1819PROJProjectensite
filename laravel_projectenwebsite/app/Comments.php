<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['id', 'user_Id', 'title', 'message', 'project_id',];
    public function users(){
      return $this->belongsTo('App\Users', 'user_id');
    }
    public function projects(){
      return $this->belongsTo('App\Projects', 'project_id');
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

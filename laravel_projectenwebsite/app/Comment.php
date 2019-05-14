<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id', 'user_Id', 'title', 'message', 'project_id',];
    public function user(){
      return $this->belongsTo('App\User', 'user_id');
    }
    public function project(){
      return $this->belongsTo('App\Project', 'project_id');
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

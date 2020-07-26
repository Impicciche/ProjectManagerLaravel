<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function users(){
        return $this->belongsToMany("App\User","tasks_users");
    }
    public function userCreator(){
        return $this->belongsTo("App\User","id","user_creator");
    }
    public function project(){
        return $this->belongsTo("App\Project");
    }
}

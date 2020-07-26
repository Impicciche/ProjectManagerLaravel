<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function index(){

    }
    
    public function store(){

    }
    
    public function create(){

    }
    
    public function update(){

    }
    
    public function destroy(){

    }
    
    public function show(){

    }
    
    public function edit(){

    }
    
    public function userResponsable(){
        return belongsTo("App\User","id","responsable_id");
    }

    public function messages(){
        return hasMany("App\Message","project_id","id");
    }
    public function tasks(){
        return hasMany("App\Task","project_id","id");
    }
    public function client(){
        return belongsTo("App\Client","id","client_id");
    }
}

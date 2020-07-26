<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
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
    
    public function user(){
        return belongsTo("App\User");
    }
    public function project(){
        return belongsTo("App\Project","id","project_id");
    }
}

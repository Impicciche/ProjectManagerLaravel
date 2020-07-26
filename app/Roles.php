<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
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
    
    public function users(){
        return belongsToMany("App\User","roles_users");
    }
}
